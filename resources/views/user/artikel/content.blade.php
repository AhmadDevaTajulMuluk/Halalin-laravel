<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>{{ $article->title }}</title>
</head>
<body id="page-content-article">
    @if (auth('web')->check())
        <x-navbar :profile="$profile"></x-navbar>
    @else
        <x-navbarustadz :ustadz="$ustadz"></x-navbarustadz>
    @endif
    <main class="header-content-article">
        <button onclick="window.history.back()" class="back-button">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </button>
        <div class="title">
            <h1 class="h1-article">{{ $article->title }}</h1>
            <div class="publish-info">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $article->writer }}</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i> {{ $article->publish_date }}</p>
            </div>
        </div>
        <div class="image">
            <img src="{{ asset('image/' . $article->article_image) }}" alt="Gambar Artikel" />
        </div>
        <article class="article-content">
            {!! nl2br(e($article->content)) !!}
        </article>
        <footer class="footer-article">
            <h3 class="h2-article" style="text-align: center;">Referensi:</h3>
            <ul>
                @foreach (explode("\n", $article->reference) as $reference)
                    <li><a href="{{ $reference }}">{{ $reference }}</a></li>
                @endforeach
            </ul>
        </footer>
        <x-footer></x-footer>
    </main>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>
