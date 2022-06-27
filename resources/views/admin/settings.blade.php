@extends('layouts.admin.app')
@section('title')
Profile Settings 
@endsection
@section('content')
<div class="container">
    <div class="row p-md-5 bg-white shadow rounded m-md-4">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Profile Settings</h3>
        </div>
        <div class="col-md-12 overflow-auto">
            <form class="form-group p-3" method="POST" action="{{ route('admin.save-settings', 1) }}">
                @csrf
                <div class="w-100 d-flex">
                    <div class="w-50 pr-2">
                        <label class="mt-3"> Branch Name </label>
                        <input 
                            type="text" 
                            name="name" 
                            class="form-control" 
                            placeholder=" name" 
                            value="{{ auth()->user()->name }}" 
                        />
                    </div>
                    <div class="w-50">
                        <label class="mt-3 "> Branch Phone </label>
                        <input type="text" name="phone" class="form-control" placeholder="branch name" value="{{ auth()->user()->phone }}" />
                    </div>
                </div>
                <div class="w-100">
                    <label class="mt-3 ">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="user@ema.com" value="{{ auth()->user()->email }}" />
                </div>
                <div class="w-100 d-flex">
                    <div class="w-50 pr-2">
                        <label class="mt-3"> Branch latitude </label>
                        <input 
                            type="text" 
                            name="lat" 
                            class="form-control" 
                            placeholder="34.545342" 
                            value="{{ auth()->user()->lat }}" 
                        />
                    </div>
                    <div class="w-50">
                        <label class="mt-3 "> Branch longitude </label>
                        <input type="text" name="lang" class="form-control" placeholder="74.545342"  value="{{ auth()->user()->lang }}" />
                    </div>
                </div>
                <div class="w-100 ">
                    <label class="mt-3 "> About Us: </label><br/>
                    <textarea name="description" class="form-control" placeholder="about us">{{ auth()->user()->description }}</textarea>
                </div>
                <div class="w-100 d-flex mt-5">
                    <h4> Social media pages </h4>
                </div>
                <div class="w-100">
                    <label class="mt-3 ">Facebok</label>
                    <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/page" value="{{ auth()->user()->facebook }}" />
                </div>
                <div class="w-100">
                    <label class="mt-3 ">Instagram</label>
                    <input type="text" name="instagram" class="form-control" placeholder="https://www.instagram.com/page" value="{{ auth()->user()->instagram }}" />
                </div>
                <div class="w-100">
                    <label class="mt-3">Twitter</label>
                    <input type="text" name="twitter" class="form-control" placeholder="https://www.twitter.com/page" value="{{ auth()->user()->twitter }}" />
                </div>
                <div class="mt-4  w-100 d-flex justify-content-end">
                    <button class="btn btn-primary ">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
