<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Chat</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    @livewireStyles
</head>
<body>
    <div id="app">
        <header class="header-chat">
            <h1>Room Chat</h1>
        </header>
        <main class="page-konsultasi">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
