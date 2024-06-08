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
          </div>
          <div id="navigator">
            <style>
              .pagination {
                display: flex;
                padding: 0;
                flex-direction: row;
                justify-content: center;
              }
              .pagination ul {
                list-style: none;
                padding: 0;
                margin: 0;
              }
              .pagination li {
                display: inline-block;
                margin-right: 5px;
                border: 1px solid #ccc;
                border-radius: 3px;
              }
              .pagination li a {
                color: #333;
                text-decoration: none;
                padding: 5px 10px;
                border: none;
                border-radius: 3px;
              }
              .pagination li.active {
                background-color: #007bff;
                color: #fff;
                border-color: #007bff;
                padding: 2px 10px;
              }
              .pagination li.disabled {
                color: #ccc;
                pointer-events: none;
                padding: 2px 10px;
              }
              .d-sm-none {
                display: none;
              }
            </style>
            {{ $articles->links() }}
          </div>
      </div>
    </main>
    <x-footer></x-footer>
  </body>
  <script type="text/javascript" src="../../assets/js/script.js"></script>
</html>
