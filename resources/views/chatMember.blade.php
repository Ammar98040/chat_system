@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat-list.min.css') }}">
@endsection

@section('content')
    @livewire('chat-message-member', ['members' => $members])
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
