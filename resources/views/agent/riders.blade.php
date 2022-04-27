@extends('layouts.agent.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Riders</h3>
        <h6> Here Data Shoing from Customers will change  </h6>
    </div>
        <div class="col-md-12 overflow-auto">
            <table class="table" style="min-width: 700px">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nmae</th>
                        <th scope="col">Email</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="">1</th>
                            <td>Muhammad</td>
                            <td>muhammad@gmail.com</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.orders') }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.orders') }}" class="btn btn-danger ml-2 ">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="{{ route('admin.orders') }}" class="btn btn-danger ml-2 custom__btn">
                                    <i class="fa fa-ban"></i> Block
                                </a>
                            </td>
                    </tr>
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
