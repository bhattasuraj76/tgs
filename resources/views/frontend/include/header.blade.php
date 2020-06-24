@section('header')
<!DOCTYPE html>
<html>

<head>

  <!DOCTYPE html>
  <html lang="en">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, shrink-to-fit=no">
  <meta name="title" content="@yield('meta_title', $meta_title)" />
  <meta name="keywords" content="@yield('meta_keywords', $meta_keywords)" />
  <meta name="description" content="@yield('meta_description', $meta_description)" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="images/png" href="{{asset('public/frontend/img/nepal-government.png')}}" />
  <?php $canonical = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  ?>
  <link rel="canonical" href="<?php echo $canonical ?>" />
  <!-- cards -->
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="@yield('title', $meta_title)" />
  <meta property="og:description" content="@yield('meta_description',$meta_description)" />
  <meta property="og:url" content="<?php echo $canonical ?>" />
  <meta property="og:site_name" content="{{$site_name}}" />
  <?php
  $d = strtotime("today");
  $postDate = date("Y-m-d h:i:sa", $d);
  ?>
  <meta property="og:updated_time" content="<?php echo $postDate ?>" />
  <meta property="og:image" content="@yield('image', asset('public/frontend/img/nepal-government.png'))" />
  <meta name="twitter:card" content="summary">
  <!-- styles -->
  <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/nepali.datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/jquery.timepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">

  <!-- import styles from inner pages -->
  @yield('after-styles')

  <title>@yield('title', $meta_title)</title>
</head>

<body>
  <header class="" style="background:#fff; padding:10px;">
    <div class="container">
      <a href="{{route('home')}}"><img src="{{asset('public/frontend/img/nepal-government.png')}}" alt="Nepal Government"></a>
      <div>
        <h3>
          नेपाल सरकार
        </h3>
        <h4>
          गृह मन्त्रालय
        </h4>
        <h2>
          जिल्ला प्रसासन कार्यालय
        </h2>
        <span>
          काठमाडौँ
        </span>
      </div>
    </div>
  </header>
  @endsection