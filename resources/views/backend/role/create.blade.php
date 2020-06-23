@extends('backend.master.master')
@section('activeUserManagement', 'active')
@section('activeRole', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Role</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary" aria-expanded="false">
                View Roles
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.role.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-lg-2 col-form-label">Title: <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input class="form-control" type="text" id="title" name="display_name" value="{{ old('display_name')}}" required>
                        <div class="help-block"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Allow Permissions :<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div class="row">
                            @foreach($permissions as $key => $permission)
                            <div class="col-3">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="permission_id[]" value="{{ $permission->id }}" @if(in_array($permission->id, old('permission_id', []))){{"checked"}}@endif required>
                                    {{ $permission->display_name }}
                                </label>
                            </div>
                            @endforeach
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


@section('after-scripts')
<script src="{{asset('public/backend/js/role.js')}}"></script>
@endsection