@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                عرض المجموعات 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">كل المجموعات</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="card">
        <div class="row mt-2 mb-2 p-2">
            <div class="col-md-9">
                <input type="text" class="filter_btn form-control" placeholder="بحث">
            </div>
            <div class="col-md-3">
                <button class="btn btn-success waves-effect waves-float waves-light" type="button" data-bs-toggle="modal" data-bs-target="#addRoom">
                    <span>
                        إضافة مجموعة جديد  
                    </span>
                </button>
            </div>
        </div>
        <div class="table table-responsive text-center pt-0">
            <table id="table-data" class="table">
                <thead class="table-light">
                    <tr>
                        <th>صورة المجموعة</th>
                        <th>المجموعة</th>
                        <th>الدولة</th>
                        <th>حالة المجموعة</th>
                        <th>عدد الأعضاء</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody class="room-list-table">
                    @forelse ($rooms as $room)
                        <tr>
                            <td>
                                @if ($room->image !== null)
                                <img class="img-fluid" src="{{ asset('/' . $room->image) }}" alt="img">
                                @else
                                <i class="fa fa-user-group"></i>
                                @endif
                            </td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->country }}</td>
                            <td>
                                @if ($room->is_active == 1)
                                    <span class="badge badge-light-success">مفعل</span>
                                @else
                                    <span class="badge badge-light-dark">غير مفعل</span>
                                @endif
                            </td>
                            <td>
                                {{ $room->members->count() }}
                            </td>
                            <td>
                                @if ($room->is_active == 1)
                                    <a class="btn btn-outline-danger waves-effect" href="{{ route('admin.room.active', ['id' => $room->id, 'action' => 'enabled']) }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success waves-effect" href="{{ route('admin.room.active', ['id' => $room->id, 'action' => 'disabled']) }}">
                                        تفعيل
                                    </a>
                                @endif
                                <button class="edit btn btn-outline-success waves-effect waves-float waves-light" type="button" data-id="{{ $room->id }}" data-name="{{ $room->name }}" data-country="{{ $room->country }}" data-bs-toggle="modal" data-bs-target="#editRoom">
                                    <span>
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </span>
                                </button>
                                <button class="showInfo btn btn-outline-primary waves-effect waves-float waves-light" type="button" data-info="{{ $room->group_links }}"  data-bs-toggle="modal" data-bs-target="#RoomInfo">
                                    <span>
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="4">لا يوجد مجموعات حتي الآن</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Modal crud starts-->
        @include('admin.rooms.models')
        <!-- Modal crud Ends-->
    </div>
@endsection


@section('js')
<script>
    $(function(){

        // action update
        $('.edit').on('click', function(e){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let country = $(this).data('country');
            $('#editRoom .id').val(id);
            $('#editRoom .name').val(name);
            $('#editRoom .country').val(country);
        });

        // action show
        $('.showInfo').on('click', function(e){
            let info = $(this).data('info');
            $('#RoomInfo .groupInfo').text(info);
        });

        // filter data
        $('.filter_btn').on('keyup', function(e){
            var value = $(this).val().toLowerCase();
            $('.room-list-table tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        })

    })
</script>
@endsection