@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-12">
@if ($bot == null)
<div class="card text-center">
<div class="card-body">
<a href="#" class="btn btn-relief-success" data-bs-toggle="modal" data-bs-target="#botCreate">
    إنشاء بوت
</a>
</div>
</div>
<!-- model create -->
@include('admin.bot.MC')
<!-- end model create -->
@else
<div class="card">
<div class="card-header text-center">
<img class="img-fluid d-block mx-auto" src="{{ asset($bot->image) }}" width="150" height="150"
    alt="bot">
</div>
<div class="card-body">
<h3 class="text-center">مرحباً بك أنا الربوت الخاص بك !</h3>
<section id="basic-tabs-components">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                aria-controls="home" role="tab" aria-selected="true">معلوماتي</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="addInfo-tab" data-bs-toggle="tab" href="#addInfo"
                aria-controls="addInfo" role="tab" aria-selected="false">إضافة تعليمات</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Info-tab" data-bs-toggle="tab" href="#Info"
                aria-controls="addInfo" role="tab" aria-selected="false">تعليمات</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="form-label">اسم البوت</label>
                        <input type="text" class="form-control" value="{{ $bot->name }}"
                            readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="form-label">وصف البوت</label>
                        <input type="text" class="form-control" value="{{ $bot->info }}"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="addInfo" aria-labelledby="addInfo-tab" role="tabpanel">
            <div class="MsgInfo alert alert-success" style="display: none">
                <div class="alert-body">
                </div>
            </div>
            <form method="POST" action="#">
                @csrf
                <input type="hidden" value="{{ $bot->id }}" name="bot_id">
                <div class="row">
                    <div class="col">
                        <label class="form-label">عندما يسألك الطالب عن :</label>
                        <textarea name="Question" class="form-control" id="Question" cols="3" rows="3"></textarea>
                    </div>
                    <div class="col">
                        <label class="form-label">تجيب عليه بما يلي :</label>
                        <textarea name="answer" class="form-control" id="answer" cols="3" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-relief-success">حفظ البيانات</button>
                </div>
            </form>
        </div>

        <div class="tab-pane" id="Info" aria-labelledby="Info-tab" role="tabpanel">
            <section id="accordion">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion accordion-border" id="accordionExample">
                                        @foreach ($botInfo as $info)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="QueHead{{ $info->id }}">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#Quetion{{ $info->id }}"
                                                        aria-expanded="true"
                                                        aria-controls="Quetion">
                                                        <p class="lead">{{ $loop->iteration }} - {{ $info->Question }}</p>
                                                    </button>
                                                </h2>
                                                <div id="Quetion{{ $info->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="QueHead{{ $info->id }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        {{ $info->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
</div>
</div>
@endif
</div>
</div>
@endsection

@section('js')
<script>
$(function() {
 $("#addInfo form").on('submit', function(e){
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "{{ route('admin.bot.info.store') }}",
        data: formData,
        success: function(res){
            $(".MsgInfo").hide();
            $(".MsgInfo .alert-body").html(res);
            $(".MsgInfo").show(500);
        }
    })
 })
})
</script>
@endsection
