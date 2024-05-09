@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat-list.css') }}">
@endsection

@section('content')
    @livewire('chat-message-private', ['groups' => $groups])
@endsection

@section('js')
<script src="{{ asset('assets/js/scripts/pages/app-chat.js') }}"></script>
<script>
    // scroll Auto
    window.addEventListener('scrollAuto', () => {
        let chat = document.querySelector(".user-chats");
        chat.scrollTop = chat.scrollHeight;
    });
</script>
@endsection
