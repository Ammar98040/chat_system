@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/pages/app-chat-list.min.css') }}">
@endsection

@section('content')
    @livewire('chat-bot', ['bot' => $bot], key($bot->id))
@endsection

@section('js')
    <script src="{{ asset('assets/js/scripts/pages/app-chat.js') }}"></script>
    <script>

        // replay Auto 
        window.addEventListener('replayAuto', () => {
            $('.btnsendBot').click();
        })

        // scroll Auto
        window.addEventListener('scrollAuto', () => {
            $(".user-chats").animate({ scrollTop: 99999 }, "slow");
        });
    </script>
@endsection