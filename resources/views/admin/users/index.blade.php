@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Users Data</h2>
                    <div class="float-right pb-4">
                        <a href="{{route("admin.users.create")}}" class="btn btn-primary">Add Users</a>
                    </div>
                    <table class="table table-striped table-responsive-lg">
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Request Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user=>$data)
                            <tr class="text-center">
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{implode(',',$data->role()->get()->pluck('name')->toArray())}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-baseline">
                                    <a href="{{route('admin.users.edit',$data->id)}}" class="btn btn-success pr-4">Edit</a>
                                    <form action="{{route('admin.users.destroy',$data->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div>
                        {{$users->links()}}
                    </div>

            </div>
            </div>
        </div>
    </div>
@endsection
