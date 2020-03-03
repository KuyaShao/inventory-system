@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2>Edit Users Details</h2>
                    <form action="{{route('admin.users.update',$user->id)}}" method="POST" class="pt-3">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{old("name")??$user->name}}"
                                   placeholder="Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text"
                                   name="email"
                                   id="email"
                                   value="{{old('email')?? $user->email}}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email Address">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   value=""
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">

                            <select class="form-control" name="roles" value="{{$user->role()->get()}} selected">
                                @foreach($roles as $role=>$data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        @error('roles')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" class="form-control">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

