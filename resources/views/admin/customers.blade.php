@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 mb-4 bg-white shadow rounded">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Customers</h3>
    </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nmae</th>
                        <th scope="col">Email</th>
                        <th scope="col">Customer Status</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td scope="">1</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        @if($customer->status === 1)
                            <td>Active</td>
                        @else
                            <td>Blocked</td>
                        @endif
                        <td class="d-flex">
                            <a href="{{ route('admin.del-customer', $customer->id ) }}" class="btn btn-danger ml-2">
                                <i class="fa fa-trash"></i>
                            </a>
                            @if($customer->status === 1)
                                <a href="{{ route('admin.block-customer', ['id'=>$customer->id, 'status'=> 0]) }}" class="btn btn-danger ml-2 custom__btn">
                                    <i class="fa fa-ban"></i> Block
                                </a>
                            @else
                                <a href="{{ route('admin.block-customer', ['id'=>$customer->id, 'status'=> 1]) }}" class="btn btn-success ml-2 custom__btn">
                                    <i class="fa fa-ban"></i> Unlock
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
