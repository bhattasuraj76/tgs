    @section('footer')
    <div class="global-loader">
        <div class="loader"></div>
    </div>
    </body>

    <!-- global vendor scripts -->
    <script src="{{asset('public/backend/vendor/modernizr/modernizr.custom.js')}}"></script>

    <script src="{{asset('public/backend/vendor/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor/js-storage/js.storage.js')}}"></script>

    <!-- <script src="{{asset('public/backend/vendor/js-cookie/src/js.cookie.js')}}"></script> -->

    <!-- <script src="{{asset('public/backend/vendor/pace/pace.js')}}"></script> -->

    <script src="{{asset('public/backend/vendor/metismenu/dist/metisMenu.js')}}"></script>

    <script src="{{asset('public/backend/vendor/switchery-npm/index.js')}}"></script>

    <script src="{{asset('public/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- page level vendor scripts -->
    <script src="{{asset('public/backend/vendor/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor_components/datatable/datatables.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>

    <script src="{{asset('public/backend/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>

    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>

    <!-- global app scripts -->
    <script src="{{asset('public/backend/js/global/app.js')}}"></script>

    <!-- custom js -->
    <script src="{{asset('public/backend/js/custom.js')}}"></script>

    <script>
        //attaching token to all ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //global variables
        var route_prefix = "{{ url(config('lfm.url_prefix')) }}"; //url for filemanager
        var baseUrl = "{{ url('/admin') }}";
        var crsftoken = $('input[name="_token"]').val();
        var defaultImage = "{{asset('public/backend/images/default/no-image.png')}}";

        loadDatepicker(); //instantiate datepicker, 
        loadTextEditor(); //instantiate texteditor, 
        loadFileManager(); //instantiate filemanager, 
        loadSelect2(); //instantiate select2
        loadDatatable(); //instantiate datatable
    </script>

    <!-- import scripts form pages -->
    @yield('after-scripts')

    </body>

    </html>
    @endsection