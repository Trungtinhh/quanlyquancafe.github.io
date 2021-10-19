@extends('layouts.basic')
@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                                    <h1 class="text-primary">
                                        ĐĂNG NHẬP
                                    </h1>
                                </a>

                                <a href="index.html" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Nhập email và mật khẩu bên dưới:</p>
                        </div>
                        <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name='email' required="" placeholder="Nhập email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name='password' class="form-control" placeholder="Nhập mật khẩu">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="checkbox-signin">Nhớ</label>
                                </div>
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Đăng nhập </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        @if (Route::has('password.request'))
                        <p> <a href="{{ route('password.request') }}" class="text-white-50 ms-1">Quên mật khẩu?</a></p>
                        @endif
                        <p class="text-white-50">Tôi chưa có tài khoản <a href="{{ route('register') }}" class="text-white ms-1"><b>Đăng ký</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection