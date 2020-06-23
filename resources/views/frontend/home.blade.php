@extends('frontend.master.master')

@section('content')
<header class="">
	<div class="container">
		<img src="{{asset('public/frontend/img/nepal-government.png')}}" alt="Nepal Government">
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

<main class="main-container">
	<div class="container">
		<div style="max-width:600px;margin:0 auto;">
			<form action="{{route('token.create')}}" method="post" class="token-form js-token-form">
				@csrf
				<h2>
					पालोे निस्सा
				</h2>
				<div class="form-group">
					<label for="first_name">सेवागाहीको नाम: </label>
					<input type="text" class="form-control" name="first_name" placeholder="सेवागाहीको नाम" required>
				</div>
				<div class="form-group">
					<label for="last_name">सेवागाहीको थर: </label>
					<input type="text" class="form-control" name="last_name" placeholder="सेवागाहीको नाम" required>
				</div>
				<div class="form-group">
					<label for="last_name">ईमेल: </label>
					<input type="email" class="form-control" name="email" placeholder="ईमेल" required>
				</div>
				<div class="form-group">
					<label for="phone">फोन नम्बर: </label>
					<input type="text" class="form-control" name="phone" placeholder="फोन नम्बर" required>
				</div>
				<div class="form-group">
					<label for="department_id">काम: </label>
					<select name="department_id" class="form-control">
						@foreach($departments as $department)
						<option value="{{$department->id}}"> {{$department->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="date">पालो मिति: </label>
					<input type="text" class="form-control calendar" name="date" id="date" placeholder="मितिः" required>
				</div>
				<div class="form-group">
					<label for="prefered_time">समयः</label>
					<input type="time" class="form-control" name="time" id="time" placeholder="समयः" required>
				</div>
				<div class="form-group">
					<button class="btn btn-blue js-token-form-submit-btn">
						Submit
					</button>
				</div>
			</form>
		</div>
	</div>
</main>

@endsection

@section('after-scripts')
<script>
	jQuery('.js-token-form').on('submit', function(e) {
		e.preventDefault();
		emptyErrorMsg();
		jQuery('.js-token-form-submit-btn').html('Wait.....');

		let formUrl = "{{route('token.create')}}";
		let formData = $(this).serialize();

		//perform ajax request to create token
		jQuery.ajax({
			url: formUrl,
			type: "post",
			data: formData,
			success: function(data) {
				if (typeof data.resp === undefined) return;

				if (data.resp == 0) {
					swal({
						'title': "Error",
						'icon': "error",
						"text": data.message
					});
					//show validation errors if present
					if (!$.isEmptyObject(data.errors)) printErrorMsg(data.errors);
				} else {
					swal({
						'title': "Success",
						'icon': "success",
						"text": data.message
					});
				}
			},
			error: function(err) {
				console.log(err);
			},
			complete: function() {
				jQuery('.js-token-form-submit-btn').html('Submit');
			}
		});
	});
</script>
@endsection