@extends('layouts.admin.app')
@section('content')
@php
    $i = 1;
@endphp
<div class="container">
    <div class="row p-3 bg-white shadow">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Categories</h3>
        <a href="{{ route('admin.add-category') }}" class="btn btn-success" >
            <i class="fa fa-plus"></i>
        </a>
    </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Nmae</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td scope="row">{{ $i++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.edit-category',  $category->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.delete-category', $category->id) }}" class="btn btn-sm btn-danger ml-2">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

