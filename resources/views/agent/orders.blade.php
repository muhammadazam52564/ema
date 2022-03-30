@extends('layouts.agent.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Orders</h3>
            <button class="btn btn-success ">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nmae</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    <td>Art Galary By Admin</td>
                    <td>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Add Image</a>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

