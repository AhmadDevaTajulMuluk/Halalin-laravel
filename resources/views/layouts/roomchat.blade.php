<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Chat</title>
    <!-- Letakkan semua link stylesheet dan script di sini -->
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Contoh untuk memuat file CSS dari direktori public -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<body>
    <div id="app">
        <!-- Header -->
        <header class="header-chat" >
            <button onclick="window.location.href='/chat'" class="back-button">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button>
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
