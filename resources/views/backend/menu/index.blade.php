@extends('backend.master.master')
@section('activeMenu', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div class="">
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.menu.index') }}">Menus</a></li>
                    <li class="breadcrumb-item active">View Menu</li>
                </ol>
            </nav>
        </div>
        <div class="">
            <a href="{{ route('admin.menu.create') }}" class="btn btn-primary" aria-expanded="false">
                + Add a menu
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
                    <table class="table table-striped table-bordered datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $key => $menuData)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ucfirst($menuData->name)}}</td>
                                <td>{{$menuData->link}}</td>
                                <td>{{ucfirst($menuData->location)}}</td>
                                <td>
                                    @if($menuData->status == 'published')
                                    <a class="btn btn-sm  btn-success text-white" href="{{route('admin.menu.status.change', $menuData->id)}}">Published</a>
                                    @else
                                    <a class="btn btn-sm btn-danger text-white" href="{{route('admin.menu.status.change', $menuData->id)}}">Draft</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.menu.managemenuitems', $menuData->id)}}" class="btn btn-sm btn-warning" title="Manage Submenu">
                                        <i class="fa fa-bars btn-warning"></i>
                                    </a>
                                    <a href="{{ route('admin.menu.edit', $menuData->id) }}" class="btn btn-sm btn-info" title="Edit">
                                        <i class="fa fa-edit btn-info"></i>
                                    </a>
                                    <form action="{{route('admin.menu.destroy', $menuData->id)}}" method="POST" class="d-inline js-destroy">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fa fa-trash btn-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Sorry, there are no results found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


