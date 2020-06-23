@extends('backend.master.master')
@section('activePage', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.page.index') }}">Pages</a></li>
                    <li class="breadcrumb-item active">Create Page</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.page.index') }}" class="btn btn-primary" aria-expanded="false">
                View Pages
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.page.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-lg-2 col-form-label">Page Title <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" value="{{ old('title') }}" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="name" class="col-lg-2 col-form-label">Slug <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" value="{{ old('slug') }}" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Description </label>
                    <div class="col-lg-10 {{ $errors->has('description') ? ' is-invalid' : '' }} ">
                        <textarea name="description" id="description" class="form-control texteditor" rows="10">{{ old('description') }}</textarea>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Image</label>
                    <div class="col-lg-10">
                        <div class="input-group {{ $errors->has('image') ? ' is-invalid' : '' }}">
                            <span class="input-group-btn">
                                <a id="pageImage" data-input="image" data-preview="holder" class="filemanager btn btn-info w-200 text-white">
                                    Choose <i class="far fa-image text-white"></i>
                                </a>
                            </span>
                            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}" />
                        </div>
                        <p> Note : max-width=1200px and min-height=350px</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <?php
                                $imageUrl = old('image') ? url('/') . old('image') : null;
                                ?>
                                <img class="img-fluid max-h-300" id="holder" src="{{  $imageUrl  }}">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="image_alt" class="col-lg-2 col-form-label">Image Alt</label>
                    <div class="col-lg-10">
                        <input type="text" name="image_alt" class="form-control {{ $errors->has('image_alt') ? ' is-invalid' : '' }}" id="image_alt" value="{{ old('image_alt') }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Meta Title</label>
                    <div class="col-lg-10">
                        <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title') }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Meta Description</label>
                    <div class="col-lg-10">
                        <textarea name="meta_description" id="meta_description" class="form-control" rows="5">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Meta Keywords</label>
                    <div class="col-lg-10">
                        <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5">{{ old('meta_keywords') }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Status </label>
                    <div class="col-lg-10">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="published" @if(old('status')=='published' ){{"checked"}}@endif>
                            Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="draft" @if(old('status')=='draft' ){{"checked"}}@endif>
                            Inactive
                        </label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-md btn-danger">Submit</button>
                        <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection