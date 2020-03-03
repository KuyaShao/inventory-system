@extends('layouts.main.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h2>Add Inventories</h2>
                    <form action="{{route('admin.inventories.update',$inventory->id)}}" method="POST" class="pt-3">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <select name="forms" id="forms" class="form-control @error('vehicle') is-invalid @enderror" onchange="checkvalue(this.value)">
                                <option>Pick atleast One</option>
                                <option value="1">Vehicle Details</option>
                                <option value="2">Purpose</option>
                                @error('req_id')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>


                        <div class="form-group" >
                            <select name="req_id" id="vehicle" class="vehicle form-control @error('vehicle') is-invalid @enderror" style="display: none">

                                @foreach($vehicle as $vehicles=>$data)
                                    <option value="{{$data->vehicle_details}}">{{$data->vehicle_details}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group" >
                            <select name="req_id" id="supply" class="supply form-control @error('vehicle') is-invalid @enderror" style="display: none">

                                @foreach($purpose as $purposes=>$data)
                                    <option value="{{$data->purpose}}">{{$data->purpose}}</option>
                                @endforeach

                            </select>
                        </div>



                        <div class="form-group">
                            <input type="text"
                                   name="requester"
                                   id="requester"
                                   value="{{old('requester') ?? $inventory->requester}}"
                                   class="form-control @error('requester') is-invalid @enderror"
                                   placeholder="Requester Name">

                            @error('requester')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text"
                                   name="gso_no"
                                   id="gso_no"
                                   value="{{old('gso_no')??$inventory->gso_no}}"
                                   class="form-control @error('requester') is-invalid @enderror"
                                   placeholder="GSO Number">

                            @error('gso_no')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number"
                                   name="qty"
                                   id="qty"
                                   value="{{old('qty')??$inventory->qty}}"
                                   class="form-control @error('qty') is-invalid @enderror"
                                   placeholder="Quantity">

                            @error('qty')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number"
                                   name="uom"
                                   id="uom"
                                   value="{{old('qty')??$inventory->uom}}"
                                   class="form-control @error('uom') is-invalid @enderror"
                                   placeholder="Quantity">

                            @error('uom')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input type="text"
                                   name="particulars"
                                   id="particulars"
                                   value="{{old('particulars')??$inventory->particulars}}"
                                   class="form-control @error('particulars') is-invalid @enderror"
                                   placeholder="Particulars">
                            @error('particulars')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   name="remarks"
                                   id="remarks"
                                   value="{{old('remarks') ?? $inventory->remarks}}"
                                   class="form-control @error('remarks') is-invalid @enderror"
                                   placeholder="Remarks">
                            @error('remarks')
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
@push('js')

@endpush
