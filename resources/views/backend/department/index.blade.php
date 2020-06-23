@extends('backend.master.master')
@section('activePackageManagement', 'active')
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
                    <li class="breadcrumb-item active">View Departments</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.department.create') }}" class="btn btn-primary" aria-expanded="false">
                Add a department
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <div class="filter-wrap clearfix">
                <form action="{{ route('admin.department.index') }}" method="GET" class="form-inline float-right">
                    <div class="form-group mr-2">
                        <?php
                        $statusArr = ['' => 'Select Status', 'active' => 'Active', 'inactive' => 'Inactive'];
                        ?>
                        <select class="form-control" name="status">
                            @foreach($statusArr as $id => $title)
                            <option value="{{$id}}" @if(Input::get('status')==$id ){{"selected"}} @endif>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $each)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$each->name}}</td>
                            <td>
                                @if($each->status == 'active')
                                <a class="btn btn-sm  btn-success text-white" href="{{route('admin.department.status.change', $each->id)}}">Active</a>
                                @else
                                <a class="btn btn-sm btn-danger text-white" href="{{route('admin.department.status.change', $each->id)}}">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.department.edit', $each->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit btn-info"></i>
                                </a>
                                <form action="{{route('admin.department.destroy', $each->id)}}" method="POST" class="d-inline js-destroy">
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
                            <td colspan="4">Sorry, there are no results found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection