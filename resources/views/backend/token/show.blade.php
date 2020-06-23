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
                    <li class="breadcrumb-item active">View a token</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.token.index') }}" class="btn btn-primary" aria-expanded="false">
                View Tokens
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <ul class="nav nav-pills " id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#token" role="tab" data-toggle="pill">Token</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#customer" role="tab" data-toggle="pill"> Customer</a>
                </li>
            </ul>
            <div class="tab-content m-t-20">
                <div role="tabpanel" class="tab-pane active" id="token">
                    @include('backend.token.token')
                </div>
                <div role="tabpanel" class="tab-pane" id="customer">
                    @include('backend.token.customer')
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-12">
                    <a class="btn btn-info text-white" href="{{route('admin.token.index')}}">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('after-scripts')
<script src="{{asset('public/backend/js/form-disable.js')}}"></script>
@endsection