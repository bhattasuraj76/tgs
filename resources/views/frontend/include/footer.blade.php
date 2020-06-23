@section('footer')

<!-- global loader -->
<div class="global-loader">
    <div class="uk-flex uk-flex-center uk-flex-middle uk-height-1-1">
        <div uk-spinner="ratio:3"></div>
    </div>
</div>
<!-- global loader -->

<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{asset('public/frontend/js/jquery-ui.js') }}"></script>
<script src="{{asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('public/frontend/js/jquery.validate.js')}}"></script>
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<!-- ================== CUSTOM JS ==================-->
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<script>
    //attaching token to all ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //global varible
    const url = "{{url('/')}}";
    const csrfToken = "{{csrf_token()}}";
</script>

<!-- ================== IMPORT JS FROM PAGES ==================-->
@yield('after-scripts')
</body>

</html>
@endsection