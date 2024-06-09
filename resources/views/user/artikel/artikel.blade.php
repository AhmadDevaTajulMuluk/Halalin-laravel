<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <title>Artikel</title>
  </head>
  <body>
    {{-- manggil navbar --}}
    <x-navbar :profile="$profile"></x-navbar>
    <main id="page-artikel" style="background-color: white">
      <div class="artikel-container">
        <h2>Artikel Populer</h2>
          <div class="artikel-box">
            @if ($articles->isEmpty())
              <div style="display: flex; justify-content: center; align-items: center; height: 200px;">
                <p>Belum ada artikel yang tersedia.</p>
              </div>
            @else
                @foreach ($articles as $article)
                    <article class="isi-artikel">
                        <img src="{{ asset( 'image/' . $article->article_image ) }}" alt="Artikel" />
                        <div class="content-artikel">
                            <h3>{{ $article->title }}</h3>
                            <p>{{ Str::limit($article->content, 150) }}</p>
                            <a href="{{ route('artikel.show', $article->article_id) }}" class="button">Selengkapnya</a>
                        </div>
                    </article>
                @endforeach
            @endif
          </div>
          <div id="navigator">
            {{ $articles->links() }}
          </div>
      </div>
    </main>
    <x-footer></x-footer>
  </body>
  <script type="text/javascript" src="../../assets/js/script.js"></script>
</html>
