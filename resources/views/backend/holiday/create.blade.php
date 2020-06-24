@extends('backend.master.master')
@section('activeHoliday', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.holiday.index') }}">Holidays</a></li>
                    <li class="breadcrumb-item active">Create Holiday</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.holiday.index') }}" class="btn btn-primary" aria-expanded="false">
                View Holidays
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.holiday.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="date" class="col-lg-2 col-form-label">Date <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }} nepali-calendar" id="date" value="{{ old('date') }}" autocomplete="off" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="remarks" class="col-lg-2 col-form-label">Remarks <span class="text-danger">*</span></label>
                    <div class="col-lg-10 {{ $errors->has('remarks') ? ' is-invalid' : '' }} ">
                        <textarea name="remarks" id="remarks" class="form-control" rows="5" required>{{ old('remarks') }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status </label>
                    <div class="col-lg-10">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="published" @if(old('status', "published" )=='published' ){{"checked"}}@endif>
                            Publish
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="draft" @if(old('status')=='draft' ){{"checked"}}@endif>
                            Draft
                        </label>
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