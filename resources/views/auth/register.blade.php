@extends('layouts.guest')

@section('content')
<div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
        <!-- Login basic -->
        <div class="card mb-0">
            <div class="card-body">
                <div class="form-header text-center">
                    <a href="index.html" class="brand-logo">
                        <img src="{{ asset('assets/images/chat.png') }}" class="img-fluid img-responsive" alt="chat">                    </a>
    
                    <h4 class="card-title mb-1">مرحباً بك من جديد </h4>
                    <p class="card-text mb-2">من فضلك قم بتسجيل الدخول لبدء استخدام البرنامج</p>
                </div>

                <form class="auth-login-form mt-2" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Request::is('admin/register'))
                        <input type="hidden" value="admin" name="usertype">
                    @else     
                        <input type="hidden" value="member" name="usertype">
                        <div class="mb-1">
                            <label for="Nation" class="form-label">الجنسية</label>
                            <input type="text" class="form-control" id="Nation" name="Nation" />
                        </div>
                        <div class="mb-1">
                            <label for="college" class="form-label">الكلية</label>
                            <input type="text" class="form-control" id="college" name="college" />
                        </div>
                        <div class="mb-1">
                            <label for="IDNum" class="form-label">رقم ID</label>
                            <input type="number" class="form-control" id="IDNum" name="IDNum" />
                        </div>
                    @endif
                    <div class="mb-1">
                        <label for="student-name" class="form-label">اسم المستخدم</label>
                        <input type="text" class="form-control" id="student-name" name="name" />
                    </div>
                    @error('name')
                        <div class="alert alert-danger">
                            <p>{{ @$message }}</p>
                        </div>
                    @enderror
                    <div class="mb-1">
                        <label for="profileImg" class="form-label">رفع صورة</label>
                        <input type="file" class="form-control" id="profileImg" name="profileImg"/>
                    </div>
                    <div class="mb-1">
                        <label for="login-email" class="form-label">البريد الإلكتروني</label>
                        <input type="text" class="form-control" id="login-email" name="email"/>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">
                            <p>{{ @$message }}</p>
                        </div>
                    @enderror
                    <div class="mb-1">
                        <label class="form-label" for="login-password"> كلمة السر</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" name="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="login-password">تأكيد كلمة السر</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" name="password_confirmation" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" tabindex="4">إنشاء حساب</button>
                </form>

                <p class="text-center mt-2">
                    <span>هل  لديك حساب ؟</span>
                    <a href="{{ route('login') }}">
                        <span>قم بتسجيل الدخول</span>
                    </a>
                </p>

                <!-- <div class="divider my-2">
                    <div class="divider-text">أو سجل عن طريق</div>
                </div> -->

                <!-- <div class="auth-footer-btn d-flex justify-content-center">
                    <a href="#" class="btn btn-facebook">
                        <i data-feather="facebook"></i>
                    </a>
                    <a href="#" class="btn btn-twitter white">
                        <i data-feather="twitter"></i>
                    </a>
                    <a href="#" class="btn btn-google">
                        <i data-feather="mail"></i>
                    </a>
                    <a href="#" class="btn btn-github">
                        <i data-feather="github"></i>
                    </a>
                </div> -->
            </div>
        </div>
        <!-- /Login basic -->
    </div>
</div>
@endsection



