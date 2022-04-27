@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12 pt-3 px-md-3">
            <div class="row justify-content-center py-2">
                <div class="col-10">
                    <h4>Order stats</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2 px-2">
                    <div class="w-100 px-5 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <!-- <i class="fa fa-eidt">123</i> -->
                            <div class="rounded-circle bg-light p-3 d-flex justify-content-center">
                                <img src="{{ asset('images/order.png') }}" width="20px" height="20px" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <b> Total Orders </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">500</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-2 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <!-- <i class="fa fa-eidt">123</i> -->
                            <div class="rounded-circle bg-light p-3 d-flex justify-content-center">
                                <img src="{{ asset('images/order.png') }}" width="20px" height="20px" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <b> Orders Completed </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">100</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-2 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <!-- <i class="fa fa-eidt">123</i> -->
                            <div class="rounded-circle bg-light p-3 d-flex justify-content-center">
                                <img src="{{ asset('images/order.png') }}" width="20px" height="20px" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <b> Pending Orders </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">500</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-2 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <!-- <i class="fa fa-eidt">123</i> -->
                            <div class="rounded-circle bg-light p-3 d-flex justify-content-center">
                                <img src="{{ asset('images/order.png') }}" width="20px" height="20px" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <b> Ongoing Orders </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">500</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-2 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <!-- <i class="fa fa-eidt">123</i> -->
                            <div class="rounded-circle bg-light p-3 d-flex justify-content-center">
                                <img src="{{ asset('images/order.png') }}" width="20px" height="20px" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <b> Cancelled Orders </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">500</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 pt-3 px-md-3">
            <div class="row justify-content-center py-2">
                <div class="col-10">
                    <h4>Overall stats</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2 px-2">
                    <div class="w-100 px-2 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <b> Total Revenue </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">£ 5.12 K</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-2 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <b> Total Earnings </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">£ 1.11 k</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-5 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <b> Managers </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">56</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-5 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <b> Users </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">500</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 px-2">
                    <div class="w-100 px-5 py-3 bg-white shadow rounded">
                        <div class="d-flex justify-content-center">
                            <b> Drivers </b>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <h2 class="mb-0">54</h2>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-md-12 pt-3 px-md-3">
            <div class="row justify-content-center py-2">
                <div class="col-10">
                    <h4>Activity</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 px-2">
                    <div class="w-100  py-5 bg-white shadow rounded">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

