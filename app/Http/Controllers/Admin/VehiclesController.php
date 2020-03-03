<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehiclesRequest;
use App\Vehicle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;
class VehiclesController extends Controller
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
        $vehicle = Vehicle::paginate(10);
        return view('admin.vehicles.index',compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('admin.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VehiclesRequest $request
     * @param Vehicle $vehicle
     * @return void
     */
    public function store(VehiclesRequest $request, Vehicle $vehicle)
    {
        //
        $vehicle->create([
            'requesting_office'=>$request->request_office,
            'vehicle_details'=>$request->vehicle_details
        ]);

        if($vehicle){
            return back()->with('success','Successfully Save');
        }else{
            return back()->with('error','Theres an error! Please contact an MIS Programmer!');
        }
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
     * @param Vehicle $vehicle
     * @return Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
        return view('admin.vehicles.edit',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VehiclesRequest $request
     * @param Vehicle $vehicle
     * @return void
     */
    public function update(VehiclesRequest $request, Vehicle $vehicle)
    {
        //
        $vehicle->update([
            'requesting_office'=>$request->request_office,
            'vehicle_details'=>$request->vehicle_details
        ]);
        if($vehicle){
            return back()->with('success','Successfully Save');
        }else{
            return back()->with('error','Theres an error! Please contact an MIS Programmer!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicle $vehicle
     * @return Response
     * @throws Exception
     */
    public function destroy(Vehicle $vehicle)
    {
        //
        if(Gate::denies('manage-users')){
            return view('statusCode');
        }
        $vehicle->delete();
        return back()->with('success','Successfully Deleted');
    }
}
