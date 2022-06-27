@extends('layouts.agent.app')
@section('title')
  Promo
@endsection
@section('content')
@php
    $i = 1;
@endphp
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Promo</h3>
        <a href="{{ route('agent.add-promo') }}" class="btn btn-success" >
            <i class="fa fa-plus"></i>
        </a>
    </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Promo Name</th>
                    <th scope="col">Promo Discount (%)</th>
                    <th scope="col">Promo Code</th>
                    <th scope="col">Promo expiry</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promos as $promo)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $promo->name }}</td>
                        <td>{{ $promo->discount }}</td>
                        <td>{{ $promo->code }}</td>
                        <td>{{ $promo->expiry }}</td>
                        <td class="d-flex">
                            <a href="{{ route('agent.edit-promo',  $promo->id) }}" class="btn btn-sm btn-primary">
                              <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('agent.delete-promo', $promo->id) }}" class="btn btn-sm btn-danger ml-2">
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

