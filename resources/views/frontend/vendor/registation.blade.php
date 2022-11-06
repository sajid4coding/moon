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
                        <h3 class="text-center text-danger">Vendor Registation</h3>
                    </div>

                    <p class="text-center">Already have an account. <a href="{{ route('vendor_login') }}">Log In</a></p>

                    <div class="register_wrap tab-content">

                        <div class="tab-pane fade show active" id="signup_tab" role="tabpanel">

                            <form action="{{ route('vendor_register_post') }}" method="POST">
                                @csrf

                                <div class="form_item_wrap">
                                    <h3 class="input_title">User Name*</h3>
                                    <div class="form_item">
                                        <label for="username_input2"><i class="fas fa-user"></i></label>
                                        <input id="username_input2" class="@error('name') is-invalid @enderror" type="text" name="name" placeholder="User Name" value="{{ old('name') }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Email*</h3>
                                    <div class="form_item">
                                        <label for="email_input"><i class="fas fa-envelope"></i></label>
                                        <input id="email_input" class="@error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Password*</h3>
                                    <div class="form_item">
                                        <label for="password_input2"><i class="fas fa-lock"></i></label>
                                        <input id="password_input2" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Confirm Password*</h3>
                                    <div class="form_item">
                                        <label for="password_input2"><i class="fas fa-lock"></i></label>
                                        <input id="password_input2" type="password" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form_item_wrap">
                                    <h3 class="input_title">Phone Number*</h3>
                                    <div class="form_item">
                                        <label for="number"><i class="fas fa-phone"></i></label>
                                        <input id="number" type="tel" name="number" placeholder="Phone Number">
                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <button type="submit" class="btn btn_secondary">Register</button>
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
