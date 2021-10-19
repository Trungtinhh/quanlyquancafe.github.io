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
                                <a href="#" class="logo text-center">
                                    <h1 class="text-success">
                                        Đăng ký
                                    </h1>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Bạn chưa có tài khoản? Đừng lo, hoàn thành biểu mẫu bên dưới để tạo tài khoản mới</p>
                        </div>
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Tên</label>
                                <input class="form-control" type="text" id="name" name='name' placeholder="Nhập tên" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name='email' required placeholder="Nhập email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">
                                    <span>Số điện thoại</span>
                                </label>
                                <input type="text" name='phone' value="" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" title="enter your phone number if any.">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="birthday">
                                    <span>Ngày sinh</span>
                                </label>
                                <input type="text" name='birthday' value="" id="basic-datepicker" class="form-control" placeholder="Nhập ngày sinh">

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mobile">
                                    <span>Địa chỉ</span>
                                </label>
                                <input type="text" name='address' value="" class="form-control" id="address" placeholder="Nhập địa chỉ" title="enter your mobile number if any.">
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
                                <label for="password" class="form-label">Xác nhận mật khẩu</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" name='password_confirmation' class="form-control" placeholder="Nhập lại mật khẩu">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms" />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                            @endif
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">Tôi chấp nhận <a href="javascript: void(0);" class="text-dark">Điều kiện và điều khoản</a></label>
                                </div>
                            </div>
                            <div class="text-center d-grid">
                                <button class="btn btn-success" type="submit"> Đăng ký </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Đã có tài khoản? <a href="{{ route('login') }}" class="text-white ms-1"><b>Đăng nhập</b></a></p>
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
@section('css')
<link href="../assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('script')
<script src="../assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<script src="../assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
<script src="../assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- Init js-->
<script src="../assets/js/pages/form-pickers.init.js"></script>

@endsection