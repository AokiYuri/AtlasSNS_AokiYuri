<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
      <div id="header">
        <div id="head">
          <a href="/top">
            <img src="{{ asset('storage/atlas.png') }}" width="95" height="35">
          </a>
          <nav class="accordion-container">
            <div class="hearder-title">
                {{ Auth::user()->username }}　さん
            </div>
            <div class="accordion-title js-accordion-title">
                <span class="arrow"></span>
            </div>
          </nav>
          <div class="accordion-icon">
            <img src="{{ asset('storage/' .Auth::user()->images) }}" alt="User Icon" width="50" height="50">
          </div>
        </div>
        <ul class="accordion-content">
          <li class="content-titles"><a href="/top">HOME</a></li>
          <li class="content-titles"><a href="/profile">プロフィール編集</a></li>
          <li class="content-titles"><a href="/logout">ログアウト</a></li>
        </ul>
      </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side_name">{{ Auth::user()->username }}さんの</p>
                <div class="side_follow">
                  <p class="count">フォロー数</p>
                  <p class="howmany">{{ Auth::user()->follows->count() }}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="side_follower">
                  <p class="count">フォロワー数</p>
                  <p class="howmany">{{ Auth::user()->followUsers->count() }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <div class="side_search">
                <p class="side_search_btn"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('/js/js.js') }} "></script>
    <script src="{{ asset('/js/script.js') }} "></script>

</body>
</html>
