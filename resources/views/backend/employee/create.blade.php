@extends('backend.master.master')
@section('activeUserManagement', 'active')
@section('activeUser', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.user.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary" aria-expanded="false">
                View Users
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center m-t-20">
                    <div class="col-xl-4 d-flex flex-column justify-content-start align-items-center">
                        @php
                        $imageUrl = asset('public/backend/images/default/no-image-md.png');
                        @endphp
                        <img src="{{$imageUrl}}" id="holder" class="team-img m-t-10">
                        <div class="img-action-row m-t-20 m-b-10 d-flex flex-column align-items-center">
                            <button class="btn upload-btn d-inline-block m-b-10 filemanager" data-input="image" data-preview="holder">Select
                                Profile
                                Picture</button>
                            <input type="hidden" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" value="{{ old('image') }}">
                            <p>Recommended size : 400 X 400</p>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label custom-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label custom-label">Email<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="phone" class="col-lg-3 col-form-label custom-label">Phone
                                No.</label>
                            <div class="col-lg-9">
                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label custom-label">Roles<span class="text-danger">*</span></label>
                            <div class="col-lg-9 {{ $errors->has('role_id') ? ' is-invalid' : '' }}">
                                <select name="role_id[]" class="form-control select2 " id="role" required>
                                    @foreach($roles as $id => $display_name)
                                    <option value="{{ $id }}" @if( old('role_id')==$id ) selected @endif>{{ $display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="password" class="col-lg-3 col-form-label custom-label">Password</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" value="{{ old('password') }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-lg-3 col-form-label custom-label">Confirm Password</label>
                            <div class="col-lg-9">
                                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-md btn-danger">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection