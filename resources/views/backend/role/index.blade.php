@extends('backend.master.master')
@section('activeUserManagement', 'active')
@section('activeRole', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Role</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary" aria-expanded="false">
                + Add a role
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
                        <th>Role</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $roleData)
                    <tr>
                        <td> {{ $roleData->display_name }} </td>
                        <td> {{ $roleData->name }} </td>
                        <td>
                            <a href="{{route('admin.role.edit', $roleData->id)}}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit btn-info"></i>
                            </a>
                            <form action="{{route('admin.role.destroy', $roleData->id)}}" method="POST" class="d-inline js-destroy">
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
                        <td colspan="3">Sorry, there are no results found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection