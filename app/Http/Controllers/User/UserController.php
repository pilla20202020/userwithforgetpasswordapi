<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Mail\ForgetUserPasswordMail;
use App\Modules\Service\Permission\PermissionService;
use App\Modules\Service\Role\RoleService;
use App\Modules\Service\User\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    protected $user, $role, $permission;

    function __construct(UserService $user, RoleService $role, PermissionService $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        $user = $this->user->paginate();
        return view('user.index',compact('user'));
    }

    public function getAllData()
    {
        // dd($this->user);
        return $this->user->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles =$this->role->paginate();
        $permissions =$this->permission->paginate();
        return view('user.create',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {

            if($user = $this->user->create($request->all())) {
                if($request->hasFile('image')) {
                    $this->uploadFile($request, $user);
                }
                Mail::to($user->email)->send(new ForgetUserPasswordMail($user));
                $user->assignRole($request->input('roles'));
                // $user->syncPermissions($request->input('permissions'));
                Toastr()->success('User Created Successfully','Success');
                return redirect()->route('user.index');

    
                
    
            }
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->user->getBySlug($id);
        $userRoles =$this->user->getUserRoles($user->id);
        $roles =$this->role->paginate();
        return view('user.edit',compact('user','roles','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = $this->user->find($id);
        $input = $request->except('roles');
        $user->syncRoles($request->input('roles'));
        $input['password'] = Hash::make($request->password);
        $user = $this->user->update($id,$input);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = $this->user->delete($id);
        return response()->json(['status'=>true]);
    }

    public function profileUpdate() {
        return view('user.profile-update');
    }

    public function profileUpdateStore(Request $request, $id) {
        if($user = $this->user->profileUpdate($request->all(), $id)) {
            // $user->syncPermissions($request->input('permissions'));
            Toastr()->success('User Profile Updated Successfully','Success');
            return redirect()->route('dashboard');

        }
    }

    public function forgetPassword($token) {
        $user = $this->user->findByToken($token);
        if(isset($user)) {
            return view('auth.passwords.reset',compact('user'));

        } else {
            return view('errors.404');
        }
    }

    public function updatePassword(Request $request) {
        $user = $this->user->passwordUpdate($request->all());
        if($user == true) {
            Toastr()->success('Password has been Updated Successfully','Success');
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }


    }
}
