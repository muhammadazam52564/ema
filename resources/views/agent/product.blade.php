@extends('layouts.agent.app')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 px-lg-5 py-2 pb-3 d-flex justify-content-between">
        <h3>Products</h3>
        <a class="btn btn-success" href="{{ route('admin.add-product') }}">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <div class="col-md-12 pb-3">
        <div class="row">
            <div class="card_cover py-2 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center py-1">
                <div class="card mx-0" style="width: 18rem;">
                    <img class="card-img-top" id="img" src="{{ asset('images/1.jpg') }}" width="100%" height="160px" alt="Card image cap">
                    <div class="card-body">
                        <div class="my-1 d-flex justify-content-around py-2">
                            <h5 class="card-title">Product name here</h5>
                            <h5 class="text-white p-1 px-2"
                                style="
                                    background-color : #ff6877;
                                    border-radius : 6px;
                                "
                            >
                                Pkr: 200
                            </h5>
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolor sit amet, consectetur adipiscing
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            <a href="#" class="btn text-white"
                                style="
                                    background-color : #ff6877;
                                "
                            > Remove </a>
                            <a href="" class="btn btn-success"> Details </a>
                            <a href="" class="btn btn-dark"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- test -->
            <div class="card_cover py-2 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center py-1">
                <div class="card mx-0" style="width: 18rem;">
                    <img class="card-img-top" id="img" src="{{ asset('images/1.jpg') }}" width="100%" height="160px" alt="Card image cap">
                    <div class="card-body">
                        <div class="my-1 d-flex justify-content-around py-2">
                            <h5 class="card-title">Product name here</h5>
                            <h5 class="text-white p-1 px-2"
                                style="
                                    background-color : #ff6877;
                                    border-radius : 6px;
                                "
                            >
                                Pkr: 200
                            </h5>
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolor sit amet, consectetur adipiscing
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            <a href="#" class="btn text-white"
                                style="
                                    background-color : #ff6877;
                                "
                            > Remove </a>
                            <a href="" class="btn btn-success"> Details </a>
                            <a href="" class="btn btn-dark"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_cover py-2 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center py-1">
                <div class="card mx-0" style="width: 18rem;">
                    <img class="card-img-top" id="img" src="{{ asset('images/1.jpg') }}" width="100%" height="160px" alt="Card image cap">
                    <div class="card-body">
                        <div class="my-1 d-flex justify-content-around py-2">
                            <h5 class="card-title">Product name here</h5>
                            <h5 class="text-white p-1 px-2"
                                style="
                                    background-color : #ff6877;
                                    border-radius : 6px;
                                "
                            >
                                Pkr: 200
                            </h5>
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolor sit amet, consectetur adipiscing
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            <a href="#" class="btn text-white"
                                style="
                                    background-color : #ff6877;
                                "
                            > Remove </a>
                            <a href="" class="btn btn-success"> Details </a>
                            <a href="" class="btn btn-dark"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_cover py-2 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center py-1">
                <div class="card mx-0" style="width: 18rem;">
                    <img class="card-img-top" id="img" src="{{ asset('images/1.jpg') }}" width="100%" height="160px" alt="Card image cap">
                    <div class="card-body">
                        <div class="my-1 d-flex justify-content-around py-2">
                            <h5 class="card-title">Product name here</h5>
                            <h5 class="text-white p-1 px-2"
                                style="
                                    background-color : #ff6877;
                                    border-radius : 6px;
                                "
                            >
                                Pkr: 200
                            </h5>
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolor sit amet, consectetur adipiscing
                        </div>
                        <div class="my-1 d-flex justify-content-around py-2">
                            <a href="#" class="btn text-white"
                                style="
                                    background-color : #ff6877;
                                "
                            > Remove </a>
                            <a href="" class="btn btn-success"> Details </a>
                            <a href="" class="btn btn-dark"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- test  -->
        </div>
    </div>
</div>
@endsection


