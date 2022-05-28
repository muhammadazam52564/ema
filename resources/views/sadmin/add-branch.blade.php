@extends('layouts.sadmin.app')
@section('title')
    Add Branch
@endsection
@section('content')
<div class="container">
    <div class="row p-3 bg-white shadow m-4 ">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Add New Branch</h3>
            <a href="{{ route('sadmin.branches') }}" class="btn btn-success" >
                All Branches
            </a>
        </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="POST" action="{{ route('sadmin.add-branch') }}">
                @csrf
                <label class="mt-3"> Branch Name </label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="Branch Name" 
                    value="{{old('name')}}"
                />
                @error('name')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <label class="mt-3"> Branch Email </label>
                <input 
                    type="text" 
                    name="email" 
                    class="form-control" 
                    placeholder="Branch Email" 
                    value="{{old('email')}}"
                />
                @error('email')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <label class="mt-3"> Branch Password </label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Branch Password" 
                    value="{{old('password')}}"
                />
                @error('password')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="mt-4  w-100 d-flex justify-content-end">

                    <button class="btn btn-primary "> Save Branch</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
