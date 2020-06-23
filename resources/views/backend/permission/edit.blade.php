@extends('backend.master.master')
@section('activeUserManagement', 'active')
@section('activePermission', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.permission.index') }}">Permission</a></li>
                    <li class="breadcrumb-item active">Edit Permission</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.permission.index') }}" class="btn btn-primary" aria-expanded="false">
                View Permissions
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.permission.update', $data->id)}}" method="POST" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="display_name" class="col-lg-2 col-form-label">Permission Title <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" id="display_name" class="form-control {{ $errors->has('display_name') ? ' is-invalid' : '' }}" name="display_name" value="{{ $data->display_name }}" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-md btn-danger">Submit</button>
                        <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection