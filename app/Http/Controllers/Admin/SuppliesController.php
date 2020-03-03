<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuppliesRequest;
use App\Supply;
use Exception;
use Illuminate\Http\Request;
use Gate;
class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $supply = Supply::paginate(10);
        return view('admin.supplies.index',compact('supply'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.supplies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SuppliesRequest $request
     * @param Supply $supply
     * @return void
     */
    public function store(SuppliesRequest $request,Supply $supply)
    {
        //

        $supply->create([
            'requesting_office'=>$request->request_office,
            'purpose'=>$request->purpose
        ]);

        if($supply){
            return back()->with('success','Successfully Save');
        }else{
            return back()->with('error','Theres an error! Please call MIS Programmer');
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
    public function edit(Supply $supply)
    {
        //
        return view('admin.supplies.edit',compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuppliesRequest $request,Supply $supply)
    {
        //
        $supply->update([
            'requesting_office'=>$request->request_office,
            'purpose'=>$request->purpose
        ]);
        if($supply){
            return back()->with('success','Successfully Save');
        }else{
            return back()->with('error','Theres an error! Please call MIS Programmer');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supply $supply
     * @return void
     * @throws Exception
     */
    public function destroy(Supply $supply)
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $supply->delete();
        return back()->with('success','Successfully Deleted');
    }
}
