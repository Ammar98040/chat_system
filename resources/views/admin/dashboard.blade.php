@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('admin.members.all') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fa fa-user me-2"></i>
                    <span>إدارة الأعضاء</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('admin.room.index') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fa fa-user-group me-2"></i>
                    <span>إدارة المجموعات</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('admin.room.Requests') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fa fa-user-plus"></i>
                    <span>إدارة طلبات الإنضمام للمجموعات</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('admin.guest.index') }}">
            <div class="card justify-content-center align-items-center">
                <div class="card-body">
                    <i class="fa fa-user-plus"></i>
                    <span>إدارة أعضاء الدردشة العامة</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('admin.bot.index') }}">
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
