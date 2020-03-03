<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Inventory;
use App\Supply;
use App\Vehicle;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\InventoriesRequest;
use Illuminate\Http\Response;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

        $inventory = Inventory::paginate(10);
        return view('admin.inventories.index',compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $vehicle = Vehicle::all();
        $purpose = Supply::all();
        return view('admin.inventories.create',compact('vehicle','purpose'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InventoriesRequest $request
     * @param Inventory $inventory
     * @return Response
     */
    public function store(InventoriesRequest $request,Inventory $inventory)
    {
        //

        $inventory->create([
            'request_details'=>$request->req_id,
            'requester'=>$request->requester,
            'uom'=>$request->uom,
            'qty'=>$request->uom,
            'particulars'=>$request->particulars,
            'remarks'=>$request->remarks,
            'gso_no'=>$request->gso_no
        ]);

        return back()->with('success','Successfully Save!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Inventory $inventories
     * @return Response
     */
    public function edit(Inventory $inventory)
    {
        //
       // $inventories=$inventory->where('id',$inventory->id);
        //dd($inventories);
        $vehicle = Vehicle::all();
        $purpose = Supply::all();
        return view('admin.inventories.edit',compact('vehicle','purpose','inventory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param InventoriesRequest $request
     * @param Inventory $inventory
     * @return void
     */
    public function update(InventoriesRequest $request, Inventory $inventory)
    {
        //
        $inventory->update([
            'request_details'=>$request->req_id,
            'requester'=>$request->requester,
            'uom'=>$request->uom,
            'qty'=>$request->qty,
            'particulars'=>$request->particulars,
            'remarks'=>$request->remarks,
            'gso_no'=>$request->gso_no
        ]);
        return back()->with('success','Successfully Save!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inventory $inventory
     * @return Response
     * @throws Exception
     */
    public function destroy(Inventory $inventory)
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $inventory->delete();
        return back()->with('success','Successfully Deleted');
    }
}
