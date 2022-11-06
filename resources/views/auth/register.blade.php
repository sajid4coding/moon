<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_asset') }}/images/favicon.png">
    <link href="{{ asset('dashboard_asset') }}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{ asset('dashboard_asset') }}/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name" class="mb-1 text-white"><strong>{{ __('Name') }}</strong></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="username" name="name" value="{{ old('name') }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="mb-1 text-white"><strong>{{ __('Email Address') }}</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="hello@example.com">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="mb-1 text-white"><strong>{{ __('Password') }}</strong></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="Password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="mb-1 text-white"><strong>{{ __('Confirm Password') }}</strong></label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="Password" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <label for="number" class="mb-1 text-white"><strong>Phone Number</strong></label>
                                            <input id="number" type="tel" class="form-control" name="number" value="number">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">{{ __('Register') }}</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="{{ url('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('dashboard_asset') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('dashboard_asset') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('dashboard_asset') }}/js/custom.min.js"></script>
<script src="{{ asset('dashboard_asset') }}/js/deznav-init.js"></script>

</body>
</html>


