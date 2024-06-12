<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Chat</title>
    <!-- Letakkan semua link stylesheet dan script di sini -->
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Contoh untuk memuat file CSS dari direktori public -->
    {{-- <style>
        /* Kontainer utama chat */
        .chat-container {
            display: flex;
            flex-direction: column;
            max-height: 80vh;
            overflow-y: auto;
            width: 80%;
            margin: 0 auto;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Judul room chat */
        .chat-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .chat-header-container {
            padding: 3rem 0;
            background-color: #fff;
        }

        .chat-footer-container {
            padding: 0.5rem 0;
            background-color: #fff;
        }

        .chat-header {
            position: absolute;
            background-color: white;
            width: 80%;
            padding: 1rem;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .chat-messages {
            padding: 1rem;
        }

        /* Kotak pesan */
        .message {
            background-color: #fff;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 6px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Nama pengirim */
        .message p:first-child {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Isi pesan */
        .message p:last-child {
            margin: 0;
        }

        /* Input pesan */
        .chat-input {
            margin-top: 20px;
            position: absolute;
            top: 1;
            bottom: 0;
            background-color: white;
            width: 80%;
            padding: 1rem;
        }

        /* Form input pesan */
        .chat-input form {
            display: flex;
        }

        /* Input teks */
        .chat-input input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px 0 0 6px;
            border-right: none;
            margin: 0;
        }

        /* Tombol kirim */
        .chat-input button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Efek hover pada tombol kirim */
        .chat-input button:hover {
            background-color: #45a049;
        }

    </style> --}}
</head>
<body>
    <div id="app">
        <!-- Header -->
        <header class="header-chat">
            <h1>Room Chat</h1>
            <!-- Mungkin Anda ingin menambahkan beberapa elemen header lainnya -->
        </header>
        
        <!-- Konten utama -->
        <main class="page-konsultasi">
            @yield('content') <!-- Ini akan digantikan dengan konten spesifik dari setiap halaman -->
        </main>
    </div>

    <!-- Letakkan semua script di bawah footer untuk meningkatkan performa -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- Contoh untuk memuat file JavaScript dari direktori public -->
</body>
</html>
