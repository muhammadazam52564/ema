@extends('layouts.admin.app')
@section('title')
Create Category
@endsection
@section('content')
<div class="container">
    <div class="row p-3 mb-4 bg-white shadow m-md-4">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Add New Category</h3>
        <a href="{{ route('admin.categories') }}" class="btn btn-success" >
            All Categories
        </a>
    </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="post" action="{{ route('admin.add-category') }}">
                @csrf
                <label> Category Name </label>
                <input type="text" name="name" class="form-control" placeholder="Category Name" />
                <div class="mt-4  w-100 d-flex justify-content-end">
                    <button class="btn btn-primary "> Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
