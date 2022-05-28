@extends('layouts.admin.app')
@section('content')
@php
$i = 1;
@endphp
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Riders</h3>
    </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nmae</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riders as $rider)
                    <tr>
                        <th scope="">{{ $i++ }}</th>
                            <td> {{ $rider->name }} </td>
                            <td> {{ $rider->email }} </td>
                            <td>
                                @if($rider->status === 1)
                                    Active
                                @elseif($rider->status === 2)
                                    Pending
                                @else
                                    Blocked
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('admin.orders') }}" class="btn btn-danger ml-2">
                                    <i class="fa fa-trash"></i>
                                </a>

                                @if($rider->status === 1)
                                    <a href="{{ route('admin.block-rider', ['id'=>$rider->id, 'status'=> 0]) }}" class="btn btn-danger ml-2 custom__btn">
                                        <i class="fa fa-ban"></i> Block
                                    </a>
                                @elseif($rider->status === 0)
                                    <a href="{{ route('admin.block-rider', ['id'=>$rider->id, 'status'=> 1]) }}" class="btn btn-success ml-2 custom__btn">
                                        <i class="fa fa-ban"></i> Unlock
                                    </a>
                                @elseif($rider->status === 2)
                                    <a href="{{ route('admin.approve-rider', $rider->id) }}" class="btn btn-success ml-2 custom__btn">
                                        <i class="fa fa-check-circle"></i> Approve
                                    </a>
                                @endif
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addManager" tabindex="-1" role="dialog" aria-labelledby="addManagerTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addManagerTitle">Modal title</h5>
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
