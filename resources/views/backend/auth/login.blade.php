<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{config('website_default.site_name')}} | Sign In</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="{{asset('public/backend/css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/layouts/vertical/themes/theme-i.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/css/common/main.bundle.css')}}">
</head>

<body class="content-menu">
    <div class="container">
        <form class="sign-in-form" action="{{ url('admin/login') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <a href="index-2.html" class="brand text-center d-block m-b-20">
                    </a>
                    <h5 class="sign-in-heading text-center m-b-20">Sign in to your account</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger" id="loginError">
                        @foreach ($errors->all() as $error)
                        <p class="mb-0"> {{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="">
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="checkbox m-b-10 m-t-20">
                        <div class="custom-control custom-checkbox checkbox-primary form-check">
                            <input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
                            <label class="custom-control-label" for="stateCheck1"> Remember me</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button>
                </div>
            </div>
        </form>
    </div>


    <script src="{{asset('public/backend/vendor/modernizr/modernizr.custom.js')}}"></script>
    <script src="{{asset('public/backend/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        setInterval(function() {
            $('#loginError').hide();
        }, 3000);
    </script>
</body>

</html>