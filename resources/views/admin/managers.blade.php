@extends('layouts.admin.app')
@section('title')
Managers
@endsection
@section('content')
@php
 $i =1;
@endphp
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Managers</h3>
            <a href="{{ route('admin.add-manager') }}" class="btn btn-success fa fa-plus"> </a>
        </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nmae</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Manager Status</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($managers as $manager)
                    <tr>
                        <td scope="">{{ $i++ }}</td>
                        <td>{{ $manager->name }}</td>
                        <td>{{ $manager->email }}</td>
                        <td>{{ $manager->phone }}</td>
                        @if($manager->status === 1)
                            <td>Active</td>
                        @else
                            <td>Blocked</td>
                        @endif
                        <td class="d-flex">
                            <a href="{{ route('admin.edit-manager', $manager->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.del-manager', $manager->id) }}" class="btn btn-sm btn-danger ml-2">
                                <i class="fa fa-trash"></i>
                            </a>
                            @if($manager->status === 1)
                                <a href="{{ route('admin.block-manager', ['id'=>$manager->id, 'status'=> 0]) }}" class="btn btn-sm btn-danger ml-2 custom__btn">
                                    <i class="fa fa-ban"></i> Block
                                </a>
                            @else
                                <a href="{{ route('admin.block-manager', ['id'=>$manager->id, 'status'=> 1]) }}" class="btn btn-sm btn-success ml-2  custom__btn">
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



