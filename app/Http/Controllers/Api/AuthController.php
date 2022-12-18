<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgetUserPasswordMail;
use App\Modules\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
class AuthController extends BaseController
{
     /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required|unique:users,phone',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole("Staff");
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        return $this->sendResponse($success, 'User register successfully.');
    }


    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user->status == null){
            return $this->sendError('Unauthorised.', ['error'=>'User is not active']);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();
            $success['token'] =  $user->createToken('authToken')->accessToken; 
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['role'] =  $user->roles->first()->name;
    
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function logout(Request $request) 
    {
        //    
        $user = Auth::guard('api')->user();
    
        $success = $user->tokens()->delete();

        return $this->sendResponse($success, 'User Logged Out successfully.');

    }

    public function details() 
    { 
        return  $this->sendResponse(Auth::guard('api')->user(), "User fetch Successfully"); 
    }

    public function forgetPassword(Request $request){
        
        $validate= Validator::make($request->all(),[
            'email'=>'required|email',
        ]);
        if($validate->fails()){
            return $this->sendError('Validation Error.', $validate->errors());       
        }
        $user= User::where('email',$request->email)->first();       
        if($user) {
            Mail::to($user->email)->send(new ForgetUserPasswordMail($user));
            return $this->sendResponse(null, "Password Changed Link send to the mail."); 
            
        }
        else{
            return $this->sendError('Sorry! User was not found.', ['error'=>'Error']);

        }
        
    }



}
