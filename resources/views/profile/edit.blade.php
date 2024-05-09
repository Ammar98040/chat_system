@extends('layouts.app')
@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                صفحة البروفايل 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">صفحة تعديل البروفايل</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="page-header">
            <h3>معلوماتك الشخصية</h3>
        </div>
    </div>
    <div class="card-body">
        @if (auth('member')->check())
            <form method="POST" action="{{ route('m.profile.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="member" name="usertype">
                <div id="user-image">
                    <img class="image-preview__image d-none" src="" alt="img">
                    @if ($myprofile->profileImg == null)
                        <i class="fa fa-user fa-4x"></i>
                    @else
                        <img class="profile-img img-fluid" src="{{ asset('/' . $myprofile->profileImg) }}" alt="user">
                    @endif
                    <div class="upload-image">
                        <input type="file" class="form-control" name="profileImg">
                        <button type="button" class="edit-image btn btn-flat-success waves-effect">تعديل</button>
                    </div>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">رقم ID</label>
                    <input type="text" class="form-control" name="IDNum" value="{{ $myprofile->IDNum }}" disabled>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">الجنسية</label>
                    <input type="text" class="form-control" name="Nation" value="{{ $myprofile->Nation }}">
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">الكلية</label>
                    <input type="text" class="form-control" name="college" value="{{ $myprofile->college }}">
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">اسمك</label>
                    <input type="text" class="form-control" name="name" value="{{ $myprofile->name }}">
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">البريد الإلكتروني</label>
                    <input type="text" class="form-control" name="email" value="{{ $myprofile->email }}">
                </div>
                <div class="mb-1">
                    <button type="submit" class="btn btn-success waves-effect waves-float waves-light">حفظ</button>
                </div>
            </form>
        @else    
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="admin" name="usertype">
                <div id="user-image">
                    <img class="image-preview__image d-none" src="" alt="img">
                    @if ($myprofile->profileImg == null)
                        <i class="fa fa-user fa-4x"></i>
                    @else
                        <img class="profile-img img-fluid" src="{{ asset('/' . $myprofile->profileImg) }}" alt="user">
                    @endif
                    <div class="upload-image">
                        <input type="file" class="form-control" name="profileImg">
                        <button type="button" class="edit-image btn btn-flat-success waves-effect">تعديل</button>
                    </div>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">اسمك</label>
                    <input type="text" class="form-control" name="name" value="{{ $myprofile->name }}">
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">البريد الإلكتروني</label>
                    <input type="text" class="form-control" name="email" value="{{ $myprofile->email }}">
                </div>
                <div class="mb-1">
                    <label class="form-label" for="">إنشاء كلمة سر جديدة</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" name="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <button type="submit" class="btn btn-success waves-effect waves-float waves-light">حفظ</button>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection

@section('js')
<script>
    $('.upload-image input').on('change', function(){
        $('#user-image i').addClass('d-none');
        $('#user-image .profile-img').addClass('d-none')
        $('#user-image .image-preview__image').removeClass('d-none');
        $('#user-image .image-preview__image')[0].src = window.URL.createObjectURL(this.files[0])
    })
</script>
@endsection
