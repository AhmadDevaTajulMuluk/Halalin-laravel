@extends('layouts.roomchat')

@section('content')
    <div>
        <div class="header-chat">
            <div class="headerchat-container" style="display: flex; justify-content: flex-end; background-color: white;">
                <div class="header-left">
                    <img src="../../assets/images/user.png" alt="group" />
                    <div class="group-name">
                        <h2 style="margin:0">Roomchat Taaruf</h2>
                        <p style="margin:0">{{ $relation->maleUser->fullname }} dan {{ $relation->femaleUser->fullname }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="roomchat">
            <div wire:poll class="bubblechat-container">
                @foreach ($chats as $chat)
                    <div class="bubble-chat {{ (auth('web')->check() && $chat->send_by == $user->username) || (auth('ustadz')->check() && $chat->send_by == 'ustadz') ? 'user' : '' }}">
                        <div class="text">
                            <div>{{ $chat->send_by == 'ustadz' ? 'Ustadz ' : '' }}
                                {{ $chat->send_by == 'ustadz' ? $relation->ustadz->name : '' }}
                                {{ $chat->send_by != 'ustadz' ? $chat->send_by : '' }}
                                @if (auth('web')->check())
                                    {{ $chat->send_by == $user->username ? '(Anda)' : '' }}
                                    <time style="color:#a0a0a0" class="text-xs opacity-30">{{ $chat->created_at->diffForHumans() }}</time>
                                @elseif (auth('ustadz')->check())
                                    {{ $chat->send_by == 'ustadz' ? '(Anda)' : '' }}
                                @endif
                            </div>
                            <p>{{ $chat->messages }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="footerchat">
            <div style="margin: 16px 20px;">
                <form action="{{ route('chat.send', $relation->hubungan_id) }}" method="POST">
                        @csrf
                        @if (auth('web')->check())
                            <input type="text" name="send_by" value="{{ Auth::user()->username }}" hidden>
                        @elseif (auth('ustadz')->check())
                            <input type="text" name="send_by" value="ustadz" hidden>
                        @endif  
                    <div class="inputbox">
                        <input type="text" name="message" placeholder="Ketik pesan..." required>
                        <div class="icon-kirim">
                            <button class="button" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
