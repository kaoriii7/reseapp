<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/18426ca9a1.js" crossorigin="anonymous"></script>
    @yield('head')
  </head>

  <body>
    <header class="header">
      <div class="ttl-wrap">
        <div class="menu-wrap">
          <nav class="nav" id="nav">
            <ul>
              <li><a href="/home">Home</a></li>
              <li><a href="{{ route('register') }}">RESISTRATION</a></li>
              <li><a href="{{ route('login') }}">LOGIN</a></li>
            </ul>
          </nav>
          <div class="menu" id="menu">
            <span class="menu__line--top"></span>
            <span class="menu__line--middle"></span>
            <span class="menu__line--bottom"></span>
          </div>
        </div>
        <h1>@yield('title')</h1>
      </div>
    </header>
    <main class="content">
    @yield('content')
    </main>
    <script src="js/common.js" type="text/javascript"></script>
  </body>

</html>