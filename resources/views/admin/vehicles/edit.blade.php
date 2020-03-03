@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2>Add Vehicle Details</h2>
                    <form action="{{route('admin.vehicles.update',$vehicle->id)}}" method="POST" class="pt-3">
                        @csrf
                        @method('PUT')

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
                                   name="vehicle_details"
                                   id="vehicle_details"
                                   value="{{old('vehicle_details')?? $vehicle->vehicle_details}}"
                                   class="form-control @error('vehicle_details') is-invalid @enderror"
                                   placeholder="Vehicle Details">
                            @error('vehicle_details')
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

