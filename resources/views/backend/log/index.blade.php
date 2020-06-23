@extends('backend.master.master')
@section('activeLog', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.log.index') }}">Logs</a></li>
                    <li class="breadcrumb-item active">View Log</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th> Subject </th>
                        <th> Module </th>
                        <th> User </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $each)
                    <tr>
                        <td> {{ $each->subject }} </td>
                        <td> {{ $each->module }} </td>
                        <td> {{ $each->email }} </td>
                        <td>
                            <form action="{{route('admin.log.destroy', $each->id)}}" method="POST" class="form-inline js-destroy">
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
</section>
@endsection