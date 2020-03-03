@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Supply Data</h2>
                    <div class="float-right pb-4">
                        <a href="{{route("admin.supplies.create")}}" class="btn btn-primary">Add Supplies Data</a>
                    </div>
                    <table class="table table-striped table-responsive-lg">
                        <tr class="text-center">
                            <th>Requesting Office</th>
                            <th>Supply Details</th>

                            <th>Request Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach($supply as $supplies=>$data)
                            <tr class="text-center">
                                <td>{{$data->requesting_office}}</td>
                                <td>{{$data->purpose}}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_date)->format('d/m/Y')}}</td>
                                <td>

                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <a href="{{route('admin.supplies.edit',$data->id)}}" class="btn btn-success pr-4">Edit</a>
                                        @can('manage-users')
                                        <form action="{{route('admin.supplies.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning">Delete</button>
                                        </form>
                                    </div>
                                        @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div>
                        {{$supply->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
