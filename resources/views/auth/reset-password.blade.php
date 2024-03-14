@extends('frontend.layout.master')

@section('content')
    <!--=============================
                BREADCRUMB START
            ==============================-->
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Reset password</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">Reset password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                BREADCRUMB END
            ==============================-->


    <!--=========================
                FORGOT PASSWORD START
            ==========================-->
    <section class="fp__signin" style="background: url(images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Reset Now!</h2>
                            <p>Reset password</p>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ old('email', $request->email) }}"
                                                required placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Password</label>
                                            <input type="password" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">{{ __('Reset Password') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account d-flex justify-content-between">
                                <a href="/login">Login</a>
                                <a href="/register">Register Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
                FORGOT PASSWORD END
            ==========================-->
@endsection
