@extends('layouts.admin.app')
@section('title')
Orders
@endsection
@section('content')
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Orders</h3>
        </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($orders as $order)
                        <tr>
                            <th>{{  $i++ }}</th>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->users->name }}</td>
                            <td> {{ $order->amount }} </td>
                            <td>
                                @if($order->status == 'pending')
                                    <p class="bg-dark px-2 rounded text-white text-center" style="width: 100px;" >{{ $order->status }}</p>
                                @elseif($order->status == 'canceled')
                                    <p class="bg-danger px-2 rounded text-white text-center" style="width:100px;">{{ $order->status }}</p>
                                @elseif($order->status == 'completed')
                                    <p class="bg-success px-2 rounded text-white text-center" style="width:100px;">{{ $order->status }}</p>
                                @else
                                    <p class="bg-primary px-2 rounded text-white text-center" style="width:100px;">{{ $order->status }}</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.invoice') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if($order->status == 'pending')
                                    <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-success fa fa-check"></a>
                                    <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-danger fa fa-times"></a>
                                @elseif($order->status == 'canceled')
                                    <!-- <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-primary">Accept</a> -->
                                @elseif($order->status == 'completed')
                                    <!-- <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-primary">Accept</a> -->
                                @else
                                    <!-- <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-primary">Accept</a> -->
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

