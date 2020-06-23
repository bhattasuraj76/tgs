@extends('backend.master.master')
@section('activeDashboard', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chage Password</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.password.change')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="oldPassword" class="col-lg-2 col-form-label">Old Password <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" id="oldPassword" name="old_password" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="password" class="col-lg-2 col-form-label">New Password <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control" type="password" id="password" name="password" minlength="6" maxlength="10" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="cpassword" class="col-lg-2 col-form-label">Confirm New Password <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input class="form-control " type="password" id="cpassword" name="password_confirmation" minlength="6" maxlength="10" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-md btn-danger">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection