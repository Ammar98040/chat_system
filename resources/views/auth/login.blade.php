@extends('layouts.guest')

@section('content')
<div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
        <!-- Login basic -->
        <div class="card mb-0">
            <div class="card-body">
                <div class="form-header text-center">
                    <a href="#" class="brand-logo">
                        <img src="{{ asset('assets/images/chat.png') }}" class="img-fluid img-responsive" alt="chat">
                    </a>
                    <h4 class="card-title mb-1">مرحباً بك من جديد </h4>
                    <p class="card-text mb-2">من فضلك قم بتسجيل الدخول لبدء استخدام البرنامج</p>
                </div>

                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if (Request::is('admin/login'))
                        <input type="hidden" value="admin" name="usertype">
                        <div class="mb-1">
                            <label for="login-email" class="form-label">البريد الإلكتروني</label>
                            <input type="text" class="form-control" id="login-email" name="email" />
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
                    @else     
                        <input type="hidden" value="member" name="usertype">
                        <div class="mb-1">
                            <label for="IDNum" class="form-label">رقم ID</label>
                            <input type="text" class="form-control" id="IDNum" name="IDNum" />
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    @endif
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="login-password">كلمة السر</label>
                            <a href="auth-forgot-password-basic.html">
                                <small>هل نسيت كلمة السر ؟</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" name="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                            <label class="form-check-label" for="remember-me">تذكرني</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" tabindex="4">تسجيل الدخول</button>
                </form>

                <p class="text-center mt-2">
                    <span>هل ليس لديك حساب ؟</span>
                    <a href="{{ route('register') }}">
                        <span>إنشاء حساب</span>
                    </a>
                </p>

                <p class="text-center">
                    <a href="{{ route('guest.chat') }}">
                        contiune guest
                    </a>
                </p>

            </div>
        </div>
        <!-- /Login basic -->
    </div>
</div>

@endsection



