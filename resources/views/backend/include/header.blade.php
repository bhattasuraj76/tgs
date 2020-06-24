@section('header')
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{config('website_default.site_name')}} | @yield('title', 'Admin Dashboard')</title>
  <link rel="icon" type="images/png" href="{{asset('public/frontend/img/nepal-government.png')}}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- google fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
  <!-- bootstrap  -->
  <link rel="stylesheet" href="{{asset('public/backend/css/vendor/bootstrap.css')}}">
  <!-- metis menu -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/metismenu/dist/metisMenu.css')}}">
  <!-- switchery npm -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/switchery-npm/index.css')}}">
  <!-- custom scrollbar -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
  <!-- fontawesome -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/fontawesome/css/all.css')}}">
  <!-- drip icons -->
  <link rel="stylesheet" href="{{asset('public/backend/css/icons/dripicons.min.css')}}">
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendor_components/datatable/datatables.min.css')}}" />
  <!-- select2  -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/select2/select2.min.css')}}">
  <!-- datepicker -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
  <!-- neapli datepicker -->
  <link rel="stylesheet" href="{{asset('public/backend/vendor/nepali-datepicker/nepali.datepicker.min.css')}}">
  <!-- global common styles -->
  <link rel="stylesheet" href="{{asset('public/backend/css/common/main.bundle.css')}}">
  <!-- layout type -->
  <link rel="stylesheet" href="{{asset('public/backend/css/layouts/vertical/core/main.css')}}">
  <!-- menu type -->
  <link rel="stylesheet" href="{{asset('public/backend/css/layouts/vertical/menu-type/content.css')}}">
  <!-- theme color styles -->
  <link rel="stylesheet" href="{{asset('public/backend/css/layouts/vertical/themes/theme-i.css')}}">
  <!-- custom css -->
  <link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
  <!-- import styles form pages -->
  @yield('after-styles')
</head>

<body class="content-menu">

  @endsection