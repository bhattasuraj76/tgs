@extends('backend.master.master')
@section('activePackageManagement', 'active')
@section('activeRegion', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.region.index') }}">Region</a></li>
                    <li class="breadcrumb-item active">Edit a region</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.region.index') }}" class="btn btn-primary" aria-expanded="false">
                View Regions
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
                    <a class="nav-link active" href="#basicinfo" role="tab" data-toggle="pill">Basic Fields</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#detail" role="tab" data-toggle="pill">Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#map" role="tab" data-toggle="pill">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#banner" role="tab" data-toggle="pill">Banner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#media" role="tab" data-toggle="pill">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#packages" role="tab" data-toggle="pill">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#seo" role="tab" data-toggle="pill">SEO</a>
                </li>
            </ul>

            <form action="{{route('admin.region.update', $regionData->id)}}" class="" method="POST">
                @csrf
                @method('put')
                <div class="tab-content m-t-20">
                    <div role="tabpanel" class="tab-pane active" id="basicinfo">
                        <div class="form-group row">
                            <label for="destination_id" class="col-lg-2 col-form-label">Destination</label>
                            <div class="col-sm-10">
                                <select name="destination_id" class="select2 form-control {{ $errors->has('destination_id') ? ' is-invalid' : '' }}" id="destination_id">
                                    @foreach($destinations as $id => $title)
                                    <option value="{{$id}}" @if($regionData->destination_id == $id){{"selected"}}@endif>{{$title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="title" class="col-lg-2 col-form-label">Region Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" value="{{ $regionData->title }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-lg-2 col-form-label">Slug <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" name="slug" class="form-control  {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" value="{{  $regionData->slug }}" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="position" class="col-lg-2 col-form-label">Display Order </label>
                            <div class="col-lg-2">
                                <input type="number" min=1 class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" id="position" value="{{  $regionData->position }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Status</label>
                            <div class="col-lg-10">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="published" @if( $regionData->status =='published' ){{"checked"}}@endif>
                                    Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="draft" @if( $regionData->status =='draft' ){{"checked"}}@endif>
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="detail">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="short_description">Short Description <br><small class="text-dark">(Not Applicable)</small></label>
                            <div class="col-lg-10 {{ $errors->has('short_description') ? ' is-invalid' : '' }}">
                                <textarea name="short_description" id="short_description" class="form-control texteditor" rows="5">{{ $regionData->short_description  }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Description </label>
                            <div class="col-lg-10 {{ $errors->has('description') ? ' is-invalid' : '' }} ">
                                <textarea name="description" id="description" class="form-control texteditor" rows="10">{{ $regionData->description }}</textarea>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="map">
                        @include('backend.region.map-edit')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="banner">
                        @include('backend.region.banner-edit')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="media">
                        @include('backend.region.media-edit')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="packages">
                        @include('backend.region.package-edit')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seo">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Meta Title</label>
                            <div class="col-lg-10">
                                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{  $regionData->meta_title }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Meta Description</label>
                            <div class="col-lg-10">
                                <textarea name="meta_description" id="meta_description" class="form-control" rows="5">{{ $regionData->meta_description }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Meta Keywords</label>
                            <div class="col-lg-10">
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5">{{ $regionData->meta_keywords }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-md btn-danger">Submit</button>
                        <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('after-scripts')
<script src="{{asset('public/backend/js/addbanner.js')}}"></script>
<script src="{{asset('public/backend/js/region.js')}}"></script>
@endsection