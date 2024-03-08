<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digiprima | Forget Passowrd</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset ('/admin_assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <!-- <a href="/" class="h1"> <img style="width: 180px;" src="{{asset ('/images/logo-digi-w.webp') }}" alt="DigiPrima Technologies logo" title="digiprima"></a> -->
            </div>
            <div class="card-body">
                <p class="login-box-msg">forgot your password? Here you can easily retrieve a new password.</p>
                <form action="{{ route('password.email') }}" method="post">
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @csrf
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block"> {{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset ('/admin_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{asset ('/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset ('/admin_assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>