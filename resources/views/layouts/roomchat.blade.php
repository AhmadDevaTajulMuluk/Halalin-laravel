<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Chat</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles
</head>
<body>
    <div id="app">
        <header class="header-chat">
            <button onclick="window.location.href='/chat'" class="back-button">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button>
            <h1>Room Chat</h1>
        </header>
        <main class="page-konsultasi" wire:poll>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
