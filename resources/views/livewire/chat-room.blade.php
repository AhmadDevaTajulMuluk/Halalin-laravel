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
            <div class="bubble-chat {{ ($chat->send_by == 'ustadz' && auth('ustadz')->check()) ? 'user' : '' }} {{ auth('web')->check() && $chat->send_by == auth()->user()->username ? 'user' : '' }}" wire:poll>
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
            <form wire:submit.prevent="send">
                <div class="inputbox">
                    <input type="text" wire:model.defer="message" placeholder="Ketik pesan..." required>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script>
    // Fungsi untuk memperbarui chat secara periodik
    function getLatestChats(relationId) {
        $.ajax({
            url: '/get-latest-chats/' + relationId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Kosongkan elemen yang menampilkan pesan agar dapat diisi dengan pesan baru
                $('.bubblechat-container').empty();

                // Iterasi melalui data pesan baru yang diterima dari server
                $.each(response.chats, function(index, chat) {
                    // Buat elemen baru untuk menampilkan pesan
                    var bubbleChat = $('<div>').addClass('bubble-chat').addClass(chat.send_by == response.user.username ? 'user' : '');
                    var text = $('<div>').addClass('text');
                    var sender = $('<div>').text(chat.send_by + (chat.send_by === 'ustadz' ?
                        ' (Ustadz)' : '') + (chat.send_by ===
                        response.sender ? ' (Anda)' : ''));
                    var message = $('<p>').text(chat.messages);

                    // Gabungkan elemen-elemen tersebut ke dalam satu elemen bubble chat
                    text.append(sender);
                    text.append(message);
                    bubbleChat.append(text);

                    // Tambahkan elemen bubble chat ke dalam container pesan
                    $('.bubblechat-container').append(bubbleChat);
                });

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Fungsi untuk mengirim pesan
    function sendMessage() {
        // Kirim pesan menggunakan Ajax
        $.ajax({
            // Konfigurasi Ajax untuk mengirim pesan
            // ...
            success: function(response) {
                // Setelah pengiriman pesan berhasil, panggil fungsi untuk mendapatkan pesan terbaru
                getLatestChats({{ $relation->hubungan_id }}); // Ganti 'relationId' dengan id relasi yang sesuai
            },
            // ...
        });
    }

    // Panggil fungsi getLatestChats saat dokumen sepenuhnya dimuat
    $(document).ready(function() {
        // Panggil getLatestChats secara periodik setiap 1 detik
        setInterval(function() {
            getLatestChats({{ $relation->hubungan_id }});
        }, 1000);
    });
</script> --}}

