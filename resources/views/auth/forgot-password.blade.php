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
                                <h3 class='text-primary'>Lấy lại mật khẩu</h3>
                            </div>
                            <p class="text-muted mb-4 mt-3">Nhập email để gửi lấy lại mật khẩu</p>
                        </div>

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif

                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name='email' required="" placeholder="Enter your email">
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Lấy lại </button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Back to <a href="{{ route('login') }}" class="text-white ms-1"><b>Đăng nhập</b></a></p>
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