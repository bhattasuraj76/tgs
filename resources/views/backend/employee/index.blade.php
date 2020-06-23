@extends('backend.master.master')
@section('activeUserManagement', 'active')
@section('activeUser', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.user.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">View User</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary" aria-expanded="false">
                + Add a user
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Profile Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $each)
                    <tr>
                        <td> {{ $each->name }} </td>
                        <td> {{ $each->email }} </td>
                        <?php
                        $rolesArr = (array) $each->roles()->pluck('display_name')->toArray();
                        ?>
                        <td>{{ implode('|', $rolesArr) }} </td>
                        <td>
                            @if(!empty($each->image))
                            <img src="{{asset($each->image)}}" style="height:80px;width:auto;">
                            @else
                            {{"N/A"}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.user.edit', $each->id)}}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit btn-info"></i>
                            </a>
                            <form action="{{route('admin.user.destroy', $each->id)}}" method="POST" class="d-inline js-destroy">
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