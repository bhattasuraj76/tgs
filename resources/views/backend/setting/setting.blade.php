@extends('backend.master.master')
@section('activeSetting', 'active')
@section('activeWebsiteConfig', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Setting</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <ul class="nav nav-pills " id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#basic-info" role="tab" aria-controls="pills-home" data-toggle="pill">Basic Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#address" role="tab" aria-controls="pills-home" data-toggle="pill"> Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#company" role="tab" aria-controls="pills-profile" data-toggle="pill">Company </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#social-media" role="tab" aria-controls="pills-profile" data-toggle="pill">Social Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#seo" role="tab" aria-controls="pills-contact" data-toggle="pill">SEO</a>
                </li>
            </ul>
            <form action="{{route('admin.setting.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="tab-content m-t-20">
                    <div role="tabpanel" class="tab-pane active" id="basic-info">
                        @include('backend.setting.basic-info')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="address">
                        @include('backend.setting.address')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="company">
                        @include('backend.setting.company')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="social-media">
                        @include('backend.setting.social-media')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seo">
                        @include('backend.setting.seo')
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-md btn-danger">Update</button>
                            <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</section>
@endsection