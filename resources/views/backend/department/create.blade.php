@extends('backend.master.master')
@section('activeDepartment', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.department.index') }}">Departments</a></li>
                    <li class="breadcrumb-item active">Add a department</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.department.index') }}" class="btn btn-primary">
                View Departments
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body m-t-20">
            <ul class="nav nav-pills " id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#overview" role="tab" data-toggle="pill">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#workingdays" role="tab" data-toggle="pill">Working Days</a>
                </li>
            </ul>
            <form id="departmentForm">
                @csrf
                <div class="tab-content m-t-20">
                    <div role="tabpanel" class="tab-pane active" id="overview">
                        <div class="form-group row">
                            <label for="name" class="col-lg-2 col-form-label">Department Name <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="description" class="col-lg-2 col-form-label">About Department </label>
                            <div class="col-lg-10">
                                <textarea name="description" id="description" class="form-control texteditor" row="10"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="position" class="col-lg-2 col-form-label">Display Order </label>
                            <div class="col-lg-2">
                                <input type="number" min="1" class="form-control" name="position" id="position" value="1">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Status</label>
                            <div class="col-lg-10">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="active" checked>
                                    Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="workingdays">
                        @include('backend.department.working-days-create')
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
<script>
    var workingDaysHtml = "{!! $selectDaysHtml !!}"
</script>
<script src="{{asset('public/backend/js/add-working-day.js')}}"></script>
<script src="{{asset('public/backend/js/department.js')}}"></script>
@endsection