@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Inventories Data</h2>
                <div class="float-right pb-4">
                    <a href="{{route("admin.inventories.create")}}" class="btn btn-primary">Add Inventories</a>
                </div>
                <table class="table table-striped table-responsive-lg">
                    <tr class="text-center">
                        <th>Requester</th>
                        <th>Qty</th>
                        <th>Uom</th>
                        <th>Particulars</th>
                        <th>Remarks</th>
                        <th>Request Form</th>
                        <th>Request Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($inventory as $inventories=>$data)
                        <tr class="text-center">
                            <td>{{$data->requester}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->uom}}</td>
                            <td>{{$data->particulars}}</td>
                            <td>{{$data->remarks}}</td>
                            <td>{{$data->request_details}}</td>
                            <td>{{ \Carbon\Carbon::parse($data->created_date)->format('d/m/Y')}}</td>
                            <td> <div class="d-flex justify-content-between align-items-baseline">
                                    <a href="{{route('admin.inventories.edit',$data->id)}}" class="btn btn-success pr-4">Edit</a>
                                    @can('manage-users')
                                        <form action="{{route('admin.inventories.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning">Delete</button>
                                        </form>
                                </div>
                                @endcan</td>
                        </tr>
                    @endforeach
                </table>

                <div>
                    {{$inventory->links()}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
