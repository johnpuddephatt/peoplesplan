<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ mix ('/css/app.css') }}">

  </head>
  <body>
    <header class="masthead">
      <div class="container">
        <a href="/" title="Go to home page" rel="home" class="site-title">The People’s Plan</a>
        <nav class="site-navigation">
          <a href="/ideas/">see all ideas</a>
        </nav>
        <nav class="site-navigation right">

            @if (Auth::guest())
              <a class="button" href="{{ url('/login') }}">Login</a>
            @else
              <a class="button text" href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
              @if(Auth::user()->is_admin)
                <a class="button" href="/admin/">Admin</a>
              @else
                <a class="button" href="/ideas/add/">Add your idea</a>
              @endif
            @endif
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

  <script type="text/javascript" src="{{mix ('/js/app.js')}}"></script>

</html>