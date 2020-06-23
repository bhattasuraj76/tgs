@extends('backend.master.master')
@section('activePackageManagement', 'active')
@section('activePackage', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.package.index') }}">Package</a></li>
                    <li class="breadcrumb-item active">View Package</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.package.create') }}" class="btn btn-primary" aria-expanded="false">
                Add Package
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body m-t-20">
            <div class="filter-wrap clearfix">
                <div class="float-right">
                    <form action="{{ route('admin.package.index') }}" method="GET" id="filter-package" accept-charset="UTF-8" class="form-inline">
                        <!-- <div class="form-group">
                            <select class="form-control" name="destination" style='margin: 3px 10px 0px;float: left;'>
                                @foreach($destinations as $id => $title)
                                <option value="{{ $id }}" style="text-transform: capitalize;" @if(Input::get('destination')==$id){{"selected"}}@endif>{{$title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="region" style='margin: 3px 10px 0px;float: left;'>
                                @foreach($regions as $id => $title)
                                <option value="{{ $id }}" style="text-transform: capitalize;" @if(Input::get('region')==$id){{"selected"}}@endif>{{$title}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <select class="form-control" name="activity" style='margin: 3px 10px 0px;float: left;'>
                                @foreach($activities as $id => $title)
                                <option value="{{ $id }}" style="text-transform: capitalize;" @if(Input::get('activity')==$id){{"selected"}}@endif>{{$title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <?php
                            $statusArr = ['' => 'Select Status', 'published' => 'Published', 'draft' => 'Draft'];
                            ?>
                            <select class="form-control" name="status" id="status" style='margin: 3px 10px 0px 5px;float: left;'>
                                @foreach($statusArr as $key => $title)
                                <option value="{{$key}}" @if(Input::get('status')==$key ){{"selected"}}@endif>{{$title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Go!</button>
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table table-striped table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Destination</th>
                            <th>Region</th>
                            <th>Activity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $packageData)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$packageData->title}}</td>
                            <td>{{$packageData->getDestinationTitle()}}</td>
                            <td>{{$packageData->getRegionTitle()}}</td>
                            <td>{{$packageData->activities_title}}</td>
                            <td>
                                @if($packageData->status == 'published')
                                <a class="btn btn-sm  btn-success text-white" href="{{route('admin.package.status.change', $packageData->id)}}">Published</a>
                                @else
                                <a class="btn btn-sm btn-danger text-white" href="{{route('admin.package.status.change', $packageData->id)}}">Draft</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.package.edit', $packageData->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit btn-info"></i>
                                </a>
                                <form action="{{route('admin.package.destroy', $packageData->id)}}" method="POST" onsubmit="return confirmDelete(event, this)" class="d-inline">
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
                            <td colspan="7">Sorry, there are no results found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

