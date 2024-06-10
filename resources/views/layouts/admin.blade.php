<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body>
    @auth('admin')
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <div class="main p-3">
            <div class="container">
                <h1 class="text-center">@yield('header')</h1>
                @yield('content')
            </div>
        </div>
    </div>
    @else
    <script type="text/javascript">
        window.location.href = "{{ route('admin.login') }}";
    </script>
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>
</html>
