@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2>Add Vehicle Details</h2>
                    <form action="{{route('admin.supplies.store')}}" method="POST" class="pt-3">
                        @csrf

                        <div class="form-group">
                            <input type="text"
                                   name="request_office"
                                   id="request_office"
                                   class="form-control @error('request_office') is-invalid @enderror"
                                   value="GSO OFFICE"
                                   placeholder="Request Office">

                            @error('request_office')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text"
                                   name="purpose"
                                   id="purpose"
                                   class="form-control @error('purpose') is-invalid @enderror"
                                   placeholder="Purpose">
                            @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" class="form-control">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

