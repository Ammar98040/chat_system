@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <a href="{{ route('chat.public') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fa fa-user me-2"></i>
                    <span>الدردشة العامة</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('chat.private') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fa fa-user-group me-2"></i>
                    <span>دردشة المجموعات</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('bot.chat') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fas fa-robot"></i>
                    <span>شات بوت</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
