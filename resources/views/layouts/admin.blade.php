<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .rating-container {
            display: flex;
            flex-direction: column;
        }
        .rating {
            display: flex;
            flex-direction: row-reverse;
            width: fit-content;
        }

        .rating input {
            display: none;
        }

        .rating label {
            cursor: pointer;
            width: 30px;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.1);
            margin-right: 10px;
            text-align: center;
            line-height: 30px;
            transition: background-color 0.4s ease;
        }

        .rating label:before {
            content: '\2605';
            font-size: 24px;
            color: #ccc;
            /* Warna bintang awalnya */
        }

        .rating input:checked~label:before,
        .rating label:hover:before {
            color: orange;
            /* Warna bintang saat dipilih atau dihover */
        }

        .rating input:checked~label:hover:before {
            color: orange;
            /* Warna bintang saat dihover untuk yang dipilih */
        }
    </style>
</head>

<body>
    @auth('admin')
        <div class="wrapper">
            @include('admin.layouts.sidebar')
            <div class="main p-3">
                <div class="container">
                    <h1 class="text-center" style="color: #052958">@yield('header')</h1>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingStars = document.querySelectorAll('.rating input');

        ratingStars.forEach(star => {
            star.addEventListener('mouseover', function() {
                const starValue = parseInt(this.value);
                highlightStars(starValue);
            });
        });

        function highlightStars(starValue) {
            ratingStars.forEach((star, index) => {
                const label = star.previousElementSibling;
                if (index >= starValue) {
                    label.classList.remove('checked');
                } else {
                    label.classList.add('checked');
                }
            });
        }
    });
</script>

</html>
