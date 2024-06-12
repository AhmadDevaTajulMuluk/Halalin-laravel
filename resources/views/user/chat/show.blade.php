@extends('layouts.roomchat')
@section('content')
    @livewire('chat-room', ['relation' => $relation, 'chats' => $chats, 'sender' => $sender, 'user' => $user])
@endsection
