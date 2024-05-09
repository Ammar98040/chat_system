@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                عرض الدردشة 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">كل الضيوف</a>
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
            <div class="col">
                <input type="text" class="filter_btn form-control" placeholder="بحث">
            </div>
        </div>
        <div class="table table-responsive pt-0">
            <table id="table-data" class="table">
                <thead class="table-light">
                    <tr>
                        <th>رقم IP الضيف</th>
                        <th>حالة الضيف</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody class="users-list-table">
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->sender_IP }}</td>
                            <td>
                                @if ($user->is_active == 1)
                                    <span class="badge badge-light-success">مفعل</span>
                                @else
                                    <span class="badge badge-light-danger">غير مفعل</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->is_active == 1)
                                    <a class="btn btn-outline-danger waves-effect" href="{{ route('admin.member.active', ['id' => $user->id, 'action' => 'disabled']) }}">
                                        حظر
                                    </a>
                                @else
                                    <a class="btn btn-outline-success waves-effect" href="{{ route('admin.guest.active', ['id' => $user->id, 'action' => 'enabled']) }}">
                                        تفعيل
                                    </a>
                                @endif     
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="3">لا يوجد ضيوف حتي الآن</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Modal crud starts-->

        <!-- Modal crud Ends-->
    </div>
@endsection



@section('js')
<script>
    $(function(){

        // filter data
        $('.filter_btn').on('keyup', function(e){
            var value = $(this).val().toLowerCase();
            $('.users-list-table tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        })

    })
</script>
@endsection