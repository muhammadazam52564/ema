@extends('layouts.agent.app')
@section('title')
    Prodcuts
@endsection
@section('content')
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
    <div class="col-md-12 p-3 px-md-3">
            <div class="px-2">
                <div class="p-2 pr-3 d-flex justify-content-between">
                    <div>
                        <h3> Products</h3>
                    </div>
                    <div>
                        <a href="{{ route('agent.add-products', $id) }}" class="btn btn-success"> 
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 overflow-auto">
                    <table class="table" style="min-width: 700px">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product )
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if(! empty($product->images[0]))
                                        <img src="../../{{ $product->images[0]->image }}" width="90px" height="50px" class="rounded">
                                    @endif
                                </td>
                                
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name }}</td>

                                <td><a href="">View</a> | <a href="{{ route('admin.remove-product', $product->id) }}">Remove</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

