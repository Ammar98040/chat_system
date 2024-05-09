@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat-list.min.css') }}">
<style>
html .content {
    margin-right: 0;
}
html .content.app-content {
    padding: 1rem;
}
.navbar-floating .header-navbar-shadow {
    display: none;
}
.guestInfo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    width: 100%;
    padding: 10px 15px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}
</style>
@endsection

@section('content')
    <div class="guestInfo">
        <span>Guest-{{ Request::ip() }}</span>
        <a class="btn btn-primary waves-effect waves-float waves-light" href="{{ url('/') }}">
            إنهاء الدردشة
        </a>
    </div>
    @livewire('chat-message-guest')
@endsection

@section('js')
    <script src="{{ asset('assets/js/scripts/pages/app-chat.js') }}"></script>
    <script>
        // scroll Auto
        window.addEventListener('scrollAuto', () => {
            $(".user-chats").animate({ scrollTop: 1 }, "slow");
        });
    </script>
@endsection
