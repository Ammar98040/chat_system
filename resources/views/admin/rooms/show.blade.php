@extends('layouts.app')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                عرض طلبات الإنضمام لمجموعات الدردشة 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">كل الطلبات</a>
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
        <div class="table table-responsive text-center pt-0">
            <table id="table-data" class="table">
                <thead class="table-light">
                    <tr>
                        <th>رقم العضو</th>
                        <th>اسم العضو</th>
                        <th>الجنسية</th>
                        <th>الكلية</th>
                        <th>المجموعة</th>
                        <th>الدولة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody class="request-list-table">
                    @forelse ($members_requests as $m_request)
                        <tr>
                            <td>{{ $m_request->member->IDNum }}</td>
                            <td>{{ $m_request->member->name }}</td>
                            <td>{{ $m_request->member->Nation }}</td>
                            <td>{{ $m_request->member->college }}</td>
                            <td>{{ $m_request->group->name }}</td>
                            <td>{{ $m_request->group->country }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.room.Requests.approved', $m_request->id) }}" class="btn btn-success waves-effect waves-float waves-light me-1">
                                    قبول
                                </a>
                                <a href="{{ route('admin.room.Requests.rejected', $m_request->id) }}" class="btn btn-danger waves-effect waves-float waves-light">
                                    رفض
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="7">لا يوجد طلبات حتي الآن</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('js')
<script>
    $(function(){

        // filter data
        $('.filter_btn').on('keyup', function(e){
            var value = $(this).val().toLowerCase();
            $('.request-list-table tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            })
        })

    })
</script>
@endsection