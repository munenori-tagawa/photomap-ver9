<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>カルーセル</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD">
  //CSSの設定など
  <!-- CSSの設定ファイル -->
  <link rel="stylesheet" href="./css/carousel.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a href="#" class="navbar-brand">カルーセル</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="Navbar">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">ホーム</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">特徴</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">価格設定</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">無効</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="検索..." aria-label="検索...">
            <button class="btn btn-outline-success flex-shrink-0" type="submit">検索</button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <!-- カルーセル
    ================================================== -->
  <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- インジケータ -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="スライド 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="スライド 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="スライド 3"></button>
    </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><rect fill="#777" width="100%" height="100%"/></svg>
          <div class="container">
            <div class="carousel-caption text-start">
              <h1>見出しの例。</h1>
              <p>カルーセルの1番目のスライドの代表的なプレースホルダーコンテンツ。</p>
              <p><a class="btn btn-primary" href="#">本日登録</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><rect fill="#777" width="100%" height="100%"/></svg>
          <div class="container">
            <div class="carousel-caption">
              <h1>別の見出しの例。</h1>
              <p>カルーセルの2番目のスライドの代表的なプレースホルダーコンテンツ。</p>
              <p><a class="btn btn-primary" href="#">もっと学ぼう</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><rect fill="#777" width="100%" height="100%"/></svg>
          <div class="container">
            <div class="carousel-caption text-end">
              <h1>もう1つ良い指標。</h1>
              <p>カルーセルの3番目のスライドの代表的なプレースホルダーコンテンツ。</p>
              <p><a class="btn btn-primary" href="#">ギャラリーを閲覧</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">前へ</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">次へ</span>
      </button>
    </div><!-- /.carousel -->

    <!-- マーケティングメッセージングとフィーチャー
      ================================================== -->
    <!-- 残りのページを別のコンテナで囲んで、すべてのコンテンツを中央に配置 -->
    <div class="container marketing">
      <!-- カルーセルの下にある3列のテキスト -->
      <div class="row">
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>一般的なプレースホルダ画像</title><rect fill="#777" width="100%" height="100%"/></svg>
          <h2 class="fw-normal">見出し</h2>
          <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
          <p><a class="btn btn-secondary" href="#">詳細を見る &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>一般的なプレースホルダ画像</title><rect fill="#777" width="100%" height="100%"/></svg>
          <h2 class="fw-normal">見出し</h2>
          <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
          <p><a class="btn btn-secondary" href="#">詳細を見る &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>一般的なプレースホルダ画像</title><rect fill="#777" width="100%" height="100%"/></svg>
          <h2 class="fw-normal">見出し</h2>
          <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
          <p><a class="btn btn-secondary" href="#">詳細を見る &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- フィーチャーを開始 -->
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">最初のフィーチャータイトル。<span class="text-muted">それはあなたの心を吹き飛ばすだろう。</span></h2>
          <p class="lead">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
        </div>
        <div class="col-md-5">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>一般的なプレースホルダ画像</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">ああ、それは良いことだ。<span class="text-muted">自分で見て。</span></h2>
          <p class="lead">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
        </div>
        <div class="col-md-5 order-md-1">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>一般的なプレースホルダ画像</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">そして、最後に、これ。<span class="text-muted">チェックメイト。</span></h2>
          <p class="lead">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
        </div>
        <div class="col-md-5">
          <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>一般的なプレースホルダ画像</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>
        </div>
      </div>

      <hr class="featurette-divider">
      <!-- /フィーチャーを終了 -->

    </div><!-- /.container -->
  </main>

  <!-- フッタ -->
  <footer class="container">
    <p class="float-right"><a href="#">トップに戻る</a></p>
    <p>&copy; 2017–2023 会社名 &middot; <a href="#">プライバシー</a> &middot; <a href="#">条項</a></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  //JavaScriptプラグインの設定など
</body>

</html>