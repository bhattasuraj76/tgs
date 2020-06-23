@extends('backend.master.master')
@section('activeToken', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"> <a href="{{ route('admin.token.index') }}">Tokens</a></li>
                    <li class="breadcrumb-item active">View Tokens</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <!-- <div class="filter-wrap clearfix">
                <form action="{{ route('admin.token.index') }}" method="GET" id="filter-page" accept-charset="UTF-8" class="float-right form-inline">
                    <div class="form-group mr-2">
                        <select class="form-control" name="department">
                            <option value="">Select Department</option>
                            @foreach($departments as $id => $name)
                            <option value="{{$id}}" @if(Input::get('department')==$id ){{"selected"}} @endif>{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mr-2">
                        @php
                        $statusArr = ['' => 'Select Status', 'valid' => 'Valid', 'invalid' => 'Invalid'];
                        @endphp
                        <select class="form-control" name="status">
                            @foreach($statusArr as $id => $title)
                            <option value="{{$id}}" @if(Input::get('status')==$id ){{"selected"}} @endif>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div> -->

            <table class="table table-striped table-bordered token-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('after-scripts')
<script>
    var url = '{{route("admin.token.index")}}';
    $('.token-table').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: url
        },
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            {
                extend: 'csv',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                },
            }, {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                },
            },
        ],
        "columnDefs": [{
            "searchable": false,
            "targets": [6, 7]
        }],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        "pagingType": "full_numbers",
        "columns": [{
                "data": "id",
                "name": "id",
                "orderable": true
            },
            {
                "data": "department_name",
                "name": "department_name",
                "orderable": true
            },
            {
                "data": "date",
                "name": "date",
                "orderable": true
            },
            {
                "data": "time_slot",
                "name": "time_slot",
                "orderable": true
            },
            {
                "data": "name",
                "name": "name",
                "orderable": true
            },
            {
                "data": "phone",
                "name": "phone",
                "orderable": true
            },
            {
                "data": "status",
                "name": "status",
                "orderable": false
            },
            {
                "data": "action",
                "name": "action",
                "orderable": false
            }
        ]
    });
</script>
@endsection