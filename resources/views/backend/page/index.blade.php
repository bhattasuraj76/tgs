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
                    <li class="breadcrumb-item active">View Pages</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.page.create') }}" class="btn btn-primary" aria-expanded="false">
                + Add a page
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <div class="filter-wrap clearfix">
                <form action="{{ route('admin.page.index') }}" method="GET" class="form-inline float-right">
                    <div class="form-group">
                        <?php
                        $statusArr = ['' => 'Select Status', 'published' => 'Published', 'draft' => 'Draft'];
                        ?>
                        <select class="form-control" name="status" id="status" style='margin: 3px 10px 0px 5px;float: left;'>
                            @foreach($statusArr as $id => $title)
                            <option value="{{$id}}" @if(Input::get('status')==$id ){{"selected"}} @endif>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div>

            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $each)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ucfirst($each->title)}}</td>
                        <td>{{$each->slug}}</td>
                        <td>
                            @if($each->status == "published")
                            <a class="btn btn-sm  btn-success text-white" href="{{route('admin.page.status.change', $each->id)}}">Published</a>
                            @else
                            <a class="btn btn-sm btn-danger text-white" href="{{route('admin.page.status.change', $each->id)}}">Draft</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.page.edit', $each->id)}}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit btn-info"></i>
                            </a>
                            <form action="{{route('admin.page.destroy', $each->id)}}" method="POST" class="d-inline js-destroy">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash btn-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Sorry, there are no results found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
