@extends('backend.master.master')
@section('activeMenu', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div class="">
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.menu.index') }}">Menus</a></li>
                    <li class="breadcrumb-item active">Edit a menuitem</li>
                </ol>
            </nav>
        </div>
        <div class="">
            <a href="{{ route('admin.menu.index') }}" class="btn btn-primary" aria-expanded="false">
                View Menus
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('errors.errors')
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{route('admin.menuitem.update', $menuitemData->id)}}" class="" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Menu Title <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="label" class="form-control {{ $errors->has('label') ? ' is-invalid' : '' }}" id="label" value="{{ $menuitemData->label }}">
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Link </label>
                                <div class="col-sm-10">
                                    <input type="text" name="link" class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}" id="link" value="{{ $menuitemData->link }}">
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="published" @if($menuitemData->status== 'published' ){{"checked"}}@endif>
                                        Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="active" @if($menuitemData->status== 'draft' ){{"checked"}}@endif>
                                        Inactive
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-md btn-danger">Update</button>
                                    <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('after-styles')

@endsection


@section('after-scripts')

@endsection