@extends('layouts.sadmin.app')
@section('title')
    Braches
@endsection
@section('content')
<div class="container">
    <div class="row p-3 mb-4 bg-white shadow rounded m-md-4">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Braches</h3>
        <a href="{{ route('sadmin.add-branch') }}">
            <button class="btn btn-success"><i class="fa fa-plus"></i></button>
        </a>

    </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nmae</th>
                        <th scope="col">Email</th>
                        <th scope="col">Branch Status</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branche)
                    <tr>
                        <td scope="">1</td>
                        <td>{{ $branche->name }}</td>
                        <td>{{ $branche->email }}</td>
                        @if($branche->status === 1)
                            <td>
                                <b class="bg-success text-white rounded py-1 px-2"> Active </b>
                            </td>
                        @else
                            <td>
                                <b class="bg-danger text-white rounded py-1 px-2"> Blocked </b>
                            </td>
                            
                        @endif
                        <td class="d-flex">
                            <a href="{{ route('sadmin.del-branch', $branche->id ) }}" class="btn btn-sm btn-danger ml-2">
                                <i class="fa fa-trash"></i>
                            </a>
                            @if($branche->status === 1)
                                <a href="{{ route('admin.block-branch', ['id'=>$branche->id, 'status'=> 0]) }}" class="btn btn-sm btn-danger ml-2 custom__btn">
                                    <i class="fa fa-lock"></i> Block
                                </a>
                            @else
                            <a href="{{ route('admin.block-branch', ['id'=>$branche->id, 'status'=> 1]) }}" class="btn btn-sm btn-success ml-2 custom__btn">
                                    <i class="fa fa-lock-open"></i> Unlock
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
