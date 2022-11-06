@extends('layouts.frontendmaster')

@section('content')
    <!-- breadcrumb_section - start
    ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Login/Register</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
    ================================================== -->

    <!-- register_section - start
    ================================================== -->
    <section class="register_section section_space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="nav register_tabnav ul_li_center">
                        <h3 class="m-auto text-center text-danger">Vendor Sign In</h3>
                    </div>

                    <p class="text-center">Don't have an account? <a href="{{ route('vendor_register') }}">Sign up</a></p>

                    <div class="register_wrap tab-content">
                        <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">

                            @if (session('Registation_Success'))
                                <div class="alert alert-success">
                                    {{ session('Registation_Success') }}
                                </div>
                            @endif

                            @if (session('login error'))
                                <div class="alert alert-danger">
                                    {{ session('login error') }}
                                </div>
                            @endif

                            <form action="{{ route('vendor_login_post') }}" method="POST">
                                @csrf
                                <div class="form_item_wrap">
                                    <h3 class="input_title">{{ __('Email Address') }}*</h3>
                                    <div class="form_item">
                                        <label for="username_input"><i class="fas fa-envelope"></i></label>
                                        <input id="username_input" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">{{ __('Password') }}*</h3>
                                    <div class="form_item">
                                        <label for="password_input"><i class="fas fa-lock"></i></label>
                                        <input id="password_input" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="row">
                                        <div class="col-6 checkbox_item">
                                            <input id="remember_checkbox" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember_checkbox">{{ __('Remember Me') }}</label>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <a href="{{ route('password.request') }}">Forget Your Password</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <button type="submit" class="btn btn_primary">{{ __('Login') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register_section - end
    ================================================== -->
@endsection
