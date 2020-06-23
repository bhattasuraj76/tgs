@extends('backend.master.master')
@section('activePackageManagement', 'active')
@section('activePackage', 'active')
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
                    <li class="breadcrumb-item"> <a href="{{ route('admin.package.index') }}">Package</a></li>
                    <li class="breadcrumb-item active">Add a package</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.package.index') }}" class="btn btn-primary" aria-expanded="false">
                View Packages
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body m-t-20">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#basicfields" role="tab" data-toggle="pill">Basic Fields</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#overviews" role="tab" data-toggle="pill">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#media" role="tab" data-toggle="pill">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#banner" role="tab" data-toggle="pill">Banner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#photos" role="tab" data-toggle="pill">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#video" role="tab" data-toggle="pill">Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services" role="tab" data-toggle="pill">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#itenaries" role="tab" data-toggle="pill">Itinerary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#datesprice" role="tab" data-toggle="pill">Dates & Price</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faqs" role="tab" data-toggle="pill">Faq</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#miscellaneous" role="tab" data-toggle="pill">Miscellaneous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#seo" role="tab" data-toggle="pill">Seo</a>
                </li>
            </ul>

            <form method="POST" enctype="multipart/form-data" id="packageForm">
                @csrf
                <div class="tab-content m-t-30">
                    <div role="tabpanel" class="tab-pane active" id="basicfields">
                        @include('backend.package.package-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="overviews">
                        @include('backend.package.overview-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="media">
                        @include('backend.package.media-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="banner">
                        @include('backend.package.banner-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="photos">
                        @include('backend.package.photos-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="video">
                        @include('backend.package.video-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="services">
                        @include('backend.package.service-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="itenaries">
                        @include('backend.package.itenary-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="datesprice">
                        @include('backend.package.datesprice-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="faqs">
                        @include('backend.package.faq-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="miscellaneous">
                        @include('backend.package.miscellaneous-create')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seo">
                        @include('backend.package.seo-create')
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-md btn-danger">Submit</button>
                        <a class="btn btn-warning" href="javascript:void(0)" onclick="history.go(-1);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('after-styles')
<style>
    input[placeholder],
    [placeholder],
    *[placeholder],
    ::placeholder {
        color: #323a48 !important;
        font-size: 1rem;
        font-weight: 300;
        padding-top: 7px;
        padding-left: 5px;
    }
</style>
@endsection

@section('after-scripts')
<script>
    $('#activities').select2({
        placeholder: "Select Activities",
        allowClear: true
    });

    var bookingStatusHtml = '{!! $bookingStatusHtml !!}';
    var chooseMealsHtml = '{!! $chooseMealsHtml !!}';
</script>

<script src="{{asset('public/backend/js/addbanner.js')}}"></script>
<script src="{{asset('public/backend/js/addphoto.js')}}"></script>
<script src="{{asset('public/backend/js/addvideo.js')}}"></script>
<script src="{{asset('public/backend/js/additenary.js')}}"></script>
<script src="{{asset('public/backend/js/adddatesprice.js')}}"></script>
<script src="{{asset('public/backend/js/addfaq.js')}}"></script>
<script src="{{asset('public/backend/js/packagedestination.js')}}"></script>
<script src="{{asset('public/backend/js/package.js')}}"></script>
<script src="{{asset('public/backend/vendor/moment/moment.min.js')}}"></script>

@endsection