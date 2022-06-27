@extends('layouts.admin.app')
@section('title')
Edit Category
@endsection
@section('content')
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Edit Category</h3>
            <a href="{{ route('admin.categories') }}" class="btn btn-success" >
                All Categories
            </a>
        </div>
        <form class="form-group pt-3 w-100" method="post" action="{{ route('admin.update-category', $category->id) }}" enctype="multipart/form-data" >
            <div class="col-md-12 overflow-auto">
                @csrf
                <div class="form-group">
                    <label>Category name</label>
                    <input type="text" name="name" class="form-control" placeholder="category name" value="{{ $category->name }}" />
                </div>
            </div>
            <div class="col-md-12 overflow-auto">
                <div class="row">
                    <div class="col-md-6 py-5 d-flex justify-content-center">
                        <div class="form-group">
                            <label for="catimage" class="btn btn-lg btn-primary ">Chose Category Image</label>
                            <input type="file" id="catimage" name="image" class="d-none"  onchange="previewImage(event, '#edit_catimage_preview')" />
                        </div>
                    </div>
                    <div class="col-md-6 pt-2 d-flex justify-content-center">
                        <div class="form-group">
                            <img src="../../{{ $category->image }}" class="" id="edit_catimage_preview" style="max-width: 170px; max-height: 120px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 overflow-auto">
                <div class="mt-4 w-100 d-flex justify-content-end">
                    <button class="btn btn-primary "> Save Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<!-- <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="post" action="{{ route('admin.update-category', $category->id) }}">
                @csrf
                <label> Category Name </label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Category Name" />
                <div class="mt-4  w-100 d-flex justify-content-end">
                    <button class="btn btn-primary "> Update Category</button>
                </div>
            </form>
        </div> -->
