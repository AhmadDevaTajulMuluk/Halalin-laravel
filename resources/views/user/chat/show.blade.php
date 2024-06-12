@extends('layouts.roomchat')

@section('content')
    <div class="chat-container">
        <div class="chat-header">
            <h2 style="margin:0 0 7px 0">Roomchat Taaruf</h2>
            <p style="margin:0">{{ $relation->maleUser->fullname }} dan {{ $relation->femaleUser->fullname }}</p>
        </div>
        <div class="chat-header-container">

        </div>
        <div class="chat-messages">
            @foreach ($chats as $chat)
                <div class="message">
                    <p>{{ $chat->send_by == 'ustadz' ? 'Ustadz ' : '' }}
                        {{ $chat->send_by == 'ustadz' ? $relation->ustadz->name : '' }}
                        {{ $chat->send_by != 'ustadz' ? $chat->send_by : '' }}
                        @if (auth('web')->check())
                            {{ $chat->send_by == $user->username ? '(Anda)' : '' }}
                        @elseif (auth('ustadz')->check())
                            {{ $chat->send_by == 'ustadz' ? '(Anda)' : '' }}
                        @endif
                        </p>
                    <p>{{ $chat->messages }}</p>
                </div>
            @endforeach
        </div>
        <div class="chat-footer-container">

        </div>
        <div class="chat-input">
            <form action="{{ route('chat.send', $relation->hubungan_id) }}" method="POST">
                @csrf
                @if (auth('web')->check())
                    <input type="text" name="send_by" value="{{ Auth::user()->username }}" hidden>
                @elseif (auth('ustadz')->check())
                    <input type="text" name="send_by" value="ustadz" hidden>
                @endif
                <input type="text" name="message" placeholder="Ketik pesan..." required>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>
@endsection
