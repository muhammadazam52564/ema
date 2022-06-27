@extends('layouts.agent.app')
@section('title')
Create Manager
@endsection
@section('content')
<div class="container">
    <div class="row p-3 bg-white shadow m-md-4 ">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Add New Manager</h3>
            <a href="{{ route('admin.managers') }}" class="btn btn-success" >
                All Managers
            </a>
        </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="POST" action="{{ route('admin.add-manager') }}">
                @csrf
                <label class="mt-3"> Manager Name </label>
                <input type="text" name="name" class="form-control" placeholder="Manager Name" />
                
                <label class="mt-3"> Manager Email </label>
                <input type="text" name="email" class="form-control" placeholder="Manager Email" />
                
                <label class="mt-3"> Manager Password </label>
                <input type="password" name="password" class="form-control" placeholder="Manager Password" />

                <input type="hidden" id="checks" name="permitions" />

                <div class="py-4">
                    <div>
                        <b>
                            Permitions
                        </b>
                    </div>
                    <div class="px-2">
                        @foreach($permitions as $permition)
                            <input 
                                type="checkbox" 
                                id="permit__{{ $permition->id }}" 
                                value="{{ $permition->id }}" 
                                onchange="add_permitions()"
                                class="permition_check"
                            >
                            <label for="box__{{ $permition->id }}" class="mr-2">{{ $permition->name }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4  w-100 d-flex justify-content-end">
                    <button class="btn btn-primary "> Save Manager</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function add_permitions() 
        {
            let values = [];
            $('input[type=checkbox]').each(function () 
            {
                this.checked ? values.push($(this).val()) : "";
            });
            $('#checks').val(values)
        }
    </script>
@endpush