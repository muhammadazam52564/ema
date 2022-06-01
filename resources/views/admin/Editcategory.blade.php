@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Edit Category</h3>
        <a href="{{ route('admin.categories') }}" class="btn btn-success" >
            All Categories
        </a>
    </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="post" action="{{ route('admin.update-category', $category->id) }}">
                @csrf
                <label> Category Name </label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Category Name" />
                <div class="mt-4  w-100 d-flex justify-content-end">
                    <button class="btn btn-primary "> Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
