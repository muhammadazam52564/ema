@extends('layouts.admin.app')
@section('title')
Edit Manager
@endsection
@section('content')
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow rounded">
    <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
        <h3>Edit Manager</h3>
        <a href="{{ route('admin.managers') }}" class="btn btn-success" >
            All Managers
        </a>
    </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group pt-3" method="POST" action="{{ route('admin.add-manager') }}">
                @csrf
                <label class="mt-3"> Manager Name </label>
                <input type="text" name="name" class="form-control" placeholder="Manager Name" value="{{$manager->name}}" />
                <label class="mt-3"> Manager Email </label>
                <input type="text" name="email" class="form-control" placeholder="Manager Email" value="{{$manager->email}}" />
                <input type="hidden" name="id" value="{{ $manager->id }}" />
                <label class="mt-3"> Manager Password </label>
                <input type="password" name="password" class="form-control" placeholder="Manager Password" />
                <small class="ml-2"><b>NOTE: </b>( Enter Password if you want to update otherwise leave empty )</small>

                <input type="hidden" id="checks" name="permitions" />

                <div class="py-4">
                    <div>
                        <b>
                            Permitions
                        </b>
                    </div>
                    <div class="px-2">
                    @foreach($permitions as $permition)
                        @if(in_array($permition->id, explode(",", $manager->permit->permition)))

                            <input type="checkbox" id="permit__{{ $permition->id }}" value="{{ $permition->id }}" checked value="{{ $permition->id }}" onchange="add_permitions()">
                            <label for="box__{{ $permition->id }}" class="mr-2">{{ $permition->name }}</label>
                        @else
                            <input type="checkbox" id="permit__{{ $permition->id }}" value="{{ $permition->id }}" onchange="add_permitions()">
                            <label for="box__{{ $permition->id }}" class="mr-2">{{ $permition->name }}</label>
                        @endif
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