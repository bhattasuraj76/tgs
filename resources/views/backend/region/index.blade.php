@extends('backend.master.master')
@section('activePackageManagement', 'active')
@section('activeRegion', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.region.index') }}">Region</a></li>
                    <li class="breadcrumb-item active">View Regions</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.region.create') }}" class="btn btn-primary" aria-expanded="false">
                Add a region
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <div class="filter-wrap clearfix">
                <div class="float-right">
                    <form action="{{ route('admin.region.index') }}" method="GET" id="filter-blog" accept-charset="UTF-8" class="form-inline">
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
            </div>

            <div class="overflow-x-auto">
                <table class="table table-striped table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $d)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$d->title}}</td>
                            <td>{{$d->destination_title}}</td>
                            <td>
                                @if($d->status == 'published')
                                <a class="btn btn-sm  btn-success text-white" href="{{route('admin.region.status.change', $d->id)}}">Published</a>
                                @else
                                <a class="btn btn-sm btn-danger text-white" href="{{route('admin.region.status.change', $d->id)}}">Draft</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.region.edit', $d->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit btn-info"></i>
                                </a>
                                <form action="{{route('admin.region.destroy', $d->id)}}" method="POST" onsubmit="return confirmDelete(event, this)" class="d-inline">
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
    </div>
</section>
@endsection

@section('after-scripts')
<script>
    $('#categories-table').DataTable({
        'paging': true,
        'lengthChange': true,
        'pageLength': 50,
        'searching': false,
        'ordering': false,
        'info': true,
        'autoWidth': false
    });
</script>
@endsection