@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 bg-white shadow mb-4 ">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Add New Manager</h3>
            <a href="{{ route('admin.managers') }}" class="btn btn-success" >
                All Managers
            </a>
        </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="POST" action="{{ route('admin.add-manager') }}">
                @csrf
                <label class="mt-3"> Manager Name </label>
                <input type="text" name="name" class="form-control" placeholder="Manager Name" />
                <label class="mt-3"> Manager Email </label>
                <input type="text" name="email" class="form-control" placeholder="Manager Email" />
                <label class="mt-3"> Manager Password </label>
                <input type="password" name="password" class="form-control" placeholder="Manager Password" />
                <div class="mt-4  w-100 d-flex justify-content-end">

                    <button class="btn btn-primary "> Save Manager</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
