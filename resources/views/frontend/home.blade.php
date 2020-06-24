@extends('frontend.master.master')
@section('title', $pageTitle)
@section('content')

<main class="main-container">
	<div class="container">
		<div style="max-width:600px;margin:0 auto;">
			<form action="{{route('token.create')}}" method="post" class="token-form js-token-form">
				@csrf
				<h2>
					पालो निस्सा
				</h2>
				<div class="form-group">
					<label for="first_name">सेवाग्रहिको नाम: </label>
					<input type="text" class="form-control" name="first_name" placeholder="सेवाग्रहिको नाम" required>
				</div>
				<div class="form-group">
					<label for="last_name">सेवाग्रहिको थर: </label>
					<input type="text" class="form-control" name="last_name" placeholder="सेवाग्रहिको थर" required>
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
					<label for="neapliDate">पालो मिति: </label>
					<input type="text" class="form-control nepali-calendar" name="date" id="nepaliDate" value="" placeholder="मितिः" required>
				</div>
				<div class="form-group">
					<label for="prefered_time">समयः</label>
					<input type="text" class="form-control timepicker" name="time" id="time" placeholder="समयः" required>
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

<footer style="background:#fff; padding:10px;">
	<div class="container text-center">
		<h3><a href="{{route('search')}}">Search your tokens</a></h3>
	</div>
	</header>
	@endsection

	@section('after-scripts')
	<script>
		//calcuate english date on change date
		// jQuery('#date').change(function() {
		// 	console.log(jQuery('#date').val());
		// 	jQuery('#englishDate').val(BS2AD(jQuery('#date').val()));

		// });

		console.log(jQuery('#nepaliDate'));
		//handle form submit
		jQuery('.js-token-form').on('submit', function(e) {
			e.preventDefault();
			emptyErrorMsg();
			jQuery('.js-token-form-submit-btn').html('Wait.....');

			let formUrl = "{{route('token.create')}}";
			let formData = new FormData($(this).get(0));
			formData.append('english_date', BS2AD(jQuery('#nepaliDate').val()));
			//perform ajax request to create token
			jQuery.ajax({
				processData: false,
				contentType: false,
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