@extends('frontend.master.master')

@section('meta_title', $page->meta_title )
@section('meta_keywords', $page->meta_keywords )
@section('meta_description', $page->meta_description )
@section('title', $page->meta_title )

@section('content')
<section class="home-spacing ">
	<div class="uk-container">
		<h2 class="cat-head">
			{{ $page->title}}
		</h2>
		@if(!empty($page))
		<div class="the-content">
			{!! $page->description !!}
		</div>
		@endif
	</div>
</section>

@endsection