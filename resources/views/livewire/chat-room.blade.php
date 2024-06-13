<!-- resources/views/livewire/chat-room.blade.php -->
<div>
    <div class="header-chat" wire:poll>
        <div class="headerchat-container">
            <div class="header-left">
                <img src="../../assets/images/user.png" alt="group" />
                <div class="group-name">
                    <h2 style="margin:0">Roomchat Taaruf</h2>
                    <p style="margin:0">{{ $maleUser->fullname }} dan {{ $femaleUser->fullname }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="roomchat">
        <div class="bubblechat-container" wire:poll>
            @foreach ($chats as $chat)
                <div class="bubble-chat {{ $chat->send_by == 'ustadz' && auth('ustadz')->check() ? 'user' : '' }} {{ auth('web')->check() && $chat->send_by == auth()->user()->username ? 'user' : '' }}"
                    wire:poll>
                    <div class="text">
                        <div>{{ $chat->send_by == 'ustadz' ? 'Ustadz ' : '' }}
                            {{ $chat->send_by == 'ustadz' ? $ustadz->name : '' }}
                            {{ $chat->send_by != 'ustadz' ? $chat->send_by : '' }}
                            @if (auth('web')->check())
                                {{ $chat->send_by == auth()->user()->username ? '(Anda)' : '' }}
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
                        <button class="button" type="submit" style="padding: 5px 10px">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Fungsi untuk memperbarui chat secara periodik
    function getLatestChats(relationId) {
        $.ajax({
            url: '/get-latest-chats/' + relationId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('.bubblechat-container').empty();

                $.each(response.chats, function(index, chat) {
                    var isCurrentUser = (response.sender === 'ustadz' && chat.send_by ===
                            'ustadz') ||
                        (response.sender !== 'ustadz' && chat.send_by === response.sender);

                    var bubbleChat = $('<div>').addClass('bubble-chat').addClass(isCurrentUser ?
                        'user' : '');
                    var text = $('<div>').addClass('text');

                    var senderName = chat.send_by === 'ustadz' ? 'Ustadz ' + response.relation
                        .ustadz.name : chat.send_by;
                    if (isCurrentUser) {
                        senderName += ' (Anda)';
                    }

                    var sender = $('<div>').text(senderName);
                    var message = $('<p>').text(chat.messages);

                    text.append(sender);
                    text.append(message);
                    bubbleChat.append(text);

                    $('.bubblechat-container').append(bubbleChat);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function scrollToBottom(elementSelector) {
        var element = $(elementSelector);
        element.scrollTop(element.prop("scrollHeight"));
    }

    $(document).ready(function() {
        var relationId = {{ $relation->hubungan_id }};
        setInterval(function() {
            getLatestChats(relationId);
            scrollToBottom('.bubblechat-container');
        }, 1000);

        $('#chat-form').on('submit', function(event) {
            event.preventDefault();
            sendMessage(relationId);
        });
    });

    function sendMessage(relationId) {
        $.ajax({
            url: '/send-message',
            type: 'POST',
            data: {
                message: $('#message').val(),
                _token: '{{ csrf_token() }}',
                relationId: relationId
            },
            success: function(response) {
                getLatestChats(relationId);
                $('#message').val('');

                // Setelah mengirim pesan, scroll ke bagian bawah
                scrollToBottom('.bubblechat-container');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>
