<?php

namespace App\Http\Controllers\TodayShare;

use App\Http\Controllers\Controller;
use App\Modules\Models\TodayShare\TodayShare;
use Illuminate\Http\Request;

class TodayShareController extends Controller
{

    function __construct(TodayShare $todayshare)
    {
        $this->todayshare = $todayshare;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todayshares = $this->todayshare->get();
        return view('todayshare.index',compact('todayshares'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todayshare.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todayshareprice = $this->todayshare->where('date',date('Y-m-d'))->first();
        if(isset($todayshareprice) && !empty($todayshareprice)) {
            Toastr()->error('Today Share Price has been already created. You cannot register another price for same date','Error');
            return redirect()->route('todayshare.index');
        } else {
            $data['price'] = $request->price;
            $data['date'] = date('Y-m-d');
            $todayshare = $this->todayshare->create($data);
            Toastr()->success('Today Share Price Created Successfully','Success');
            return redirect()->route('todayshare.index');
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
        $todayshare = $this->todayshare->where('id',$id)->first();
        return view('todayshare.edit', compact('todayshare'));
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
        $todayshare = $this->todayshare->where('id',$id);
        $data['price'] = $request->price;
        $data['date'] = date('Y-m-d');
        if($todayshare->update($data)) {
            Toastr()->success('Today Share Price Updated Successfully','Success');
            return redirect()->route('todayshare.index');
        }
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
        $todayshare = $this->todayshare->where('id',$id);
        $todayshare->delete();
        Toastr()->success('Today Share Price Deleted Successfully','Success');
        return redirect()->route('todayshare.index');
    }
}
