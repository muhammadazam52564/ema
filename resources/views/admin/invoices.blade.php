@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 mb-4 bg-white shadow rounded">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h5>INVOICE</h5>
            <h5>#135178</h5>
        </div>
        <div class="col-md-12 py-2">
            <div class="row d-flex justify-content-between">
                <div class=""col-md-6">
                    <h5>Customer: Muhammad Azam</h5>
                    <p>muhammadazam30@gmail.com</p>
                </div>
                <div class=""col-md-6">
                    <p>Invoice Date : Saturday, April 07 2022</p>
                    <p> 1642 Cambridge Drive, Phoenix, 85029 Arizona </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Unit Cost</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td> Grilled Sandwich </td>
                        <td>1</td>
                        <td>$ 20 </td>
                        <td>$ 20 </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td> Fried Egg Sandwich </td>
                        <td>1</td>
                        <td>$ 70 </td>
                        <td>$ 70 </td>
                    </tr>
                    <tr>
                        <td  class="px-3" colspan="4" style="text-align:right;"> Total Cost: </td>
                        <td> $ 90 </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
