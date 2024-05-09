@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                عرض الأعضاء 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">كل الأعضاء</a>
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
            {{-- <div class="col-md-2">
                <button class="btn btn-success waves-effect waves-float waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in">
                    <span>
                        إضافة عضو جديد  
                    </span>
                </button>
            </div> --}}
        </div>
        <div class="table table-responsive pt-0">
            <table id="table-data" class="table">
                <thead class="table-light">
                    <tr>
                        <th>رقم ID</th>
                        <th>اسم العضو</th>
                        <th>البريد الإلكتروني</th>
                        <th>حالة الحساب</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody class="members-list-table">
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->IDNum }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
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
                                    <a class="btn btn-outline-success waves-effect" href="{{ route('admin.member.active', ['id' => $user->id, 'action' => 'enabled']) }}">
                                        تفعيل
                                    </a>
                                @endif
                            
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5">لا يوجد اعضاء حتي الآن</td>
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
            $('.members-list-table tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        })

    })
</script>
@endsection