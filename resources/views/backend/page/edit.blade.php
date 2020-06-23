@extends('backend.master.master')
@section('activePage', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div class="">
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.page.index') }}">Pages</a></li>
                    <li class="breadcrumb-item active">Edit Page</li>
                </ol>
            </nav>
        </div>
        <div class="">
            <a href="{{ route('admin.page.index') }}" class="btn btn-primary" aria-expanded="false">
                View Pages
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
                        <form action="{{route('admin.page.update', [$data->id])}}" class="" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-form-label">Page Title <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control  {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" value="{{ $data->title }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-form-label">Slug <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="slug" class="form-control  {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" value="{{  $data->slug }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Description </label>
                                <div class="col-lg-10 {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    <textarea name="description" id="description" class="form-control texteditor" rows="10">{{ $data->description  }}</textarea>
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
                                        <input type="text" class="form-control" id="image" name="image" value="{{ $data->image }}" />
                                    </div>
                                    <p> Note : max-width=1200px and min-height=350px</p>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="@if(!empty($data->image)){{asset($data->image)}}@endif" class="img-fluid max-h-300" alt="" id="holder">
                                            <br>
                                            @if(!empty($data->image))
                                            <a href="{{ route('admin.page.image.destroy', $data->id) }}" class="btn btn-danger m-t-5 text-white" data-image="image" data-holder="holder" onclick="return ajaxDeletePicture(event, this);">Delete</a>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Meta Title</label>
                                <div class="col-lg-10">
                                    <input name="meta_title" id="meta_title" class="form-control" type="text" value="{{  $data->meta_title  }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Meta Description</label>
                                <div class="col-lg-10">
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="5">{{ $data->meta_description  }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Meta Keywords</label>
                                <div class="col-lg-10">
                                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="5">{{ $data->meta_keywords  }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Status </label>
                                <div class="col-lg-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="published" @if( $data->status == 'published' ){{"checked"}}@endif>
                                        Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="draft" @if( $data->status == 'draft' ){{"checked"}}@endif>
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
            </div>
        </div>
    </div>
</section>

@endsection


@section('after-styles')

@endsection


@section('vendor-scripts')
<script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
@endsection

@section('after-scripts')
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
    $('.filemanager').filemanager('image', {
        prefix: route_prefix
    });

    //ckeditor
    $('.texteditor').each(function() {
        CKEDITOR.replace(this.id, {
            filebrowserBrowseUrl: "{{ url(config('lfm.url_prefix')) }}",
            filebrowserUploadUrl: "{{ url(config('lfm.url_prefix')) }}"
        });
    });
</script>

@endsection