@extends('backend.master.master')
@section('activeHoliday', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.holiday.index') }}">Holidays</a></li>
                    <li class="breadcrumb-item active">View Holidays</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.holiday.create') }}" class="btn btn-primary" aria-expanded="false">
                + Add a holiday
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <div class="filter-wrap clearfix">
                <form action="{{ route('admin.holiday.index') }}" method="GET" id="filter-page" accept-charset="UTF-8" class="float-right form-inline">
                    <div class="form-group mr-2">
                        <select class="form-control" name="year">
                            <option value="">Select Year</option>
                            @for($i = date('Y')-1; $i <= date('Y')+1; $i++) <option value="{{$i}}" @if(Input::get('year')==$i){{"selected"}} @endif>{{$i}}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="form-group mr-2">
                        @php
                        $statusArr = ['' => 'Select Status', 'published' => 'Published', 'draft' => 'Draft'];
                        @endphp
                        <select class="form-control" name="status">
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
                        <th>Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $each)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$each->date}}</td>
                        <td>{{$each->remarks}}</td>
                        <td>
                            @if($each->status == "published")
                            <a class="btn btn-sm  btn-success text-white" href="{{route('admin.holiday.status.change', $each->id)}}">Published</a>
                            @else
                            <a class="btn btn-sm btn-danger text-white" href="{{route('admin.holiday.status.change', $each->id)}}">Draft</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.holiday.edit', $each->id)}}" class="btn btn-sm btn-info">
                                <i class="fa fa-edit btn-info"></i>
                            </a>
                            <form action="{{route('admin.holiday.destroy', $each->id)}}" method="POST" class="d-inline js-destroy">
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