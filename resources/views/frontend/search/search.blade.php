@extends('frontend.master.master')
@section('title', $pageTitle)
@section('content')


<main class="main-container">
    <div class="container">
        <div style="max-width:600px;margin:0 auto;">
            <form action="{{route('search')}}" method="post" class="token-form js-search-form">
                @csrf
                <h2>
                    पालो निस्सा
                </h2>
                <div class="form-group">
                    <label for="last_name">ईमेल: </label>
                    <input type="email" class="form-control" name="email" placeholder="ईमेल" required>
                </div>
                <div class="form-group">
                    <label for="last_name">सेवाग्रहिको थर: </label>
                    <input type="text" class="form-control" name="last_name" placeholder="सेवाग्रहिको थर" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-blue js-search-form-submit-btn">
                        Search
                    </button>
                    <a class="btn btn-secondary" href="{{route('home')}}">
                        Go Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection

@section('after-scripts')
<script>
    jQuery('.js-search-form').on('submit', function(e) {
        e.preventDefault();
        emptyErrorMsg();
        jQuery('.js-search-form-submit-btn').html('Wait.....');

        let formUrl = "{{route('search')}}";
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
                        'icon': "success",
                        "text": data.message
                    });
                }
            },
            error: function(err) {
                console.log(err);
            },
            complete: function() {
                jQuery('.js-search-form-submit-btn').html('Submit');
            }
        });
    });
</script>
@endsection