@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 bg-white shadow rounded">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Orders</h3>
        </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Time & Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>#RS12311</td>
                        <td>Muhammad</td>
                        <td>08:32 PM 28 January, 2022</td>
                        <td> $ 20.5 </td>
                        <td>
                            <p class="bg-warning px-3 py-1 " style="width:fit-content">pending</p>
                        </td>
                        <td>
                            <a href="{{ route('admin.invoice') }}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.orders') }}" class="btn btn-primary">Accept</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>#RS12312</td>
                        <td>Muhammad</td>
                        <td>08:33 PM 28 January, 2022</td>
                        <td> $ 20.5 </td>
                        <td>
                            <p class="bg-warning px-3 py-1 " style="width:fit-content">pending</p>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders') }}" class="btn btn-primary">Accept</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

