<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="/css/app.css">

  </head>
  <body>
    <header class="masthead">
      <div class="container">
        <a href="/" title="Go to home page" rel="home" class="site-title">The People’s Plan</a>
        <nav class="site-navigation">
          <a href="#">see the ideas</a>
        </nav>
        <nav class="site-navigation right">
          <a class="button" href="#">Add your idea</a>
        </nav>

      </div>
    </header>


    @yield('content')


    <footer class="site-footer">
      <div class="container">
        <p>People’s Plan for Digital</p>
      </div>
    </footer>
  </body>

  <script type="text/javascript" src="/js/app.js"></script>

</html>