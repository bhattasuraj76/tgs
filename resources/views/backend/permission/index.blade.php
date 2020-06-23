@extends('backend.master.master')
@section('activeUserManagement', 'active')
@section('activePermission', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.permission.index') }}">Permission</a></li>
                    <li class="breadcrumb-item active">View Permission</li>
                </ol>
            </nav>
        </div>
        <div>
            <a class="btn btn-primary" href="javascript::void(0);" aria-expanded="false" onclick="history.back();">
                Go Back
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body overflow-x-auto">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th>Permission</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $each)
                    <tr>
                        <td> {{ $each->display_name }} </td>
                        <td> {{ $each->name }} </td>
                        <td>
                            <a href="{{route('admin.permission.edit', $each->id)}}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit btn-info"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">Sorry, there are no results found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

