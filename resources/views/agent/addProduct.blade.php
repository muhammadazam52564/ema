@extends('layouts.agent.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Add Product</h3>
            <!-- <button class="btn btn-success ">
                <i class="fa fa-plus"></i>
            </button> -->
        </div>
        <div class="col-md-6">
            <div class="bg-white p-3">
                <form>
                    <h5>ADD PRODUCT FORM</h5>
                    <div class="form-group">
                        <label for="pname">Product Type</label>
                        <select class="form-control">
                            <option value=""> Simple Product </option>
                            <option value=""> Variable Product </option>
                            <option value=""> Grouped Product </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" id="pname" class="form-control" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" id="category" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="d-flex">
                        <div class="form-group w-50 px-1">
                            <label for="qty">Qty</label>
                            <input type="text" id="qty" class="form-control" placeholder="Qty 1">
                        </div>
                        <div class="form-group w-50 px-1">
                            <label for="price">Price</label>
                            <input type="text" id="price" class="form-control" placeholder="pkr 100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            type="text"
                            id="description"
                            class="form-control"
                            placeholder="Product Description"
                        >
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="Image">Product Image</label>
                        <input type="file" id="Image" class=" form-control" placeholder="Product Image">
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-white">
                <h1> Ok Product </h1>
            </div>
        </div>
    </div>
</div>
@endsection
