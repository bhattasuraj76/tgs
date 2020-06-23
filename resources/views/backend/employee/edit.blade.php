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
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary" aria-expanded="false">
                View Users
            </a>
        </div>
    </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <form action="{{route('admin.user.update', $data->id)}}" method="POST" onsubmit="return validateForm();" enctype="multipart/form-data">
                @csrf
                @method('put')
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#basicinfo" role="tab" aria-controls="pills-basicinfo" data-toggle="pill">General Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reset" role="tab" aria-controls="pills-reset" data-toggle="pill">Reset Password</a>
                    </li>
                </ul>

                <div class="row justify-content-center m-t-20">
                    <div class="col-xl-4 d-flex flex-column justify-content-start align-items-center">
                        @php
                        $imageUrl = empty($data->image) ? asset('public/backend/images/default/no-image-md.png') : asset($data->image);
                        @endphp
                        <img src="{{$imageUrl}}" id="holder" class="team-img m-t-10">
                        <div class="img-action-row m-t-20 m-b-10">
                            @if(!empty($data->image))
                            <button class="btn btn-info filemanager" data-input="image" data-preview="holder"><i class="fa fa-edit btn-info"></i>Change
                            </button>
                            <a class="btn btn-xs btn-danger text-white" href="{{ route('admin.team.image.destroy', $data->id) }}">
                                <i class="fa fa-trash btn-danger"></i>Delete
                            </a>
                            @else
                            <button class="btn upload-btn d-inline-block filemanager" data-input="image" data-preview="holder">Select
                                Profile
                                Picture</button>
                            @endif
                        </div>
                        <input type="hidden" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" value="{{ $data->image }}">
                        <p>Recommended size : 400 X 400</p>
                    </div>
                    <div class="col-xl-8">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="basicinfo">
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label custom-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="email" class="col-lg-3 col-form-label custom-label">Email<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{ $data->email }}" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="phone" class="col-lg-3 col-form-label custom-label">Phone
                                        No.</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $data->phone }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label custom-label">Roles<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 {{ $errors->has('role_id') ? ' is-invalid' : '' }}">
                                        <select name="role_id[]" class="form-control select2 " id="role" required>
                                            @foreach($roles as $id => $display_name)
                                            <option value="{{ $id }}" @if( in_array($id, $data->getRolesId()) ){{"selected"}} @endif>{{ $display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reset">
                                <div class="form-group row">
                                    <label for="password" class="col-lg-3 col-form-label custom-label">Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-lg-3 col-form-label custom-label">Confirm Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-md btn-danger">Submit</button>
                        <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection


@section('after-styles')
<style>

</style>
@endsection


@section('after-scripts')
<script>
    // $(function () {
    //     var passFields = $('[type=password]');
    //     passFields.change(function () {
    //         if (passFields.not([value=""])) {
    //             passFields.attr('required', 'required');
    //         } else {
    //             passFields.removeAttr('required');
    //         }
    //     });
    // });
    function validateForm() {
        $passVal = $('#password').val();
        $confirmVal = $('#password_confirmation').val();
        if (($passVal && !$confirmVal) || ($confirmVal && !$passVal)) {
            //switch password tab
            $('[href="#reset"]').trigger('click');
            //focus on empty field
            $('[type=password]').filter(function() {
                return !this.value;
            }).focus();

            alert('The password fields are required');
            return false;
        }
        return true;
    }
</script>
@endsection