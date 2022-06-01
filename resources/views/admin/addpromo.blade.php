@extends('layouts.admin.app')
@section('title')
Create Promo
@endsection
@section('content')
<div class="container">
    <div class="row p-3 mb-4 bg-white shadow m-md-4">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Add New promo</h3>
        <a href="{{ route('admin.promo') }}" class="btn btn-success" >
            All Promos
        </a>
    </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="post" action="{{ route('admin.add-promo') }}">
                @csrf
                <div class="">
                    <div class="form-group p-2">
                        <label> Promo Name </label>
                        <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}" />
                        @error('name')
                            <b class="text-danger">* {{ $message }}</b>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label> Promo Code </label>
                        <input type="text" name="code" class="form-control" placeholder="code" value="{{ old('code') }}" />
                        @error('code')
                            <b class="text-danger">* {{ $message }}</b>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <div class="form-group p-2">
                        <label> Promo discount (%) </label>
                        <input type="text" name="discount" class="form-control" placeholder="discount" value="{{ old('discount') }}" />
                        @error('discount')
                            <b class="text-danger">* {{ $message }}</b>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label> Promo expiry </label>
                        <input type="date" name="expiry" class="form-control" placeholder="15-03-2025" value="{{ old('expiry') }}" />
                        @error('expiry')
                            <b class="text-danger">* {{ $message }}</b>
                        @enderror
                    </div>

                </div>

                <div class="mt-4  w-100 d-flex justify-content-end">
                    <button class="btn btn-primary "> Save Promo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
