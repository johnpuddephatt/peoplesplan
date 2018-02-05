<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110965626-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-110965626-1');
    </script>

    <link rel="stylesheet" href="{{ mix ('/css/app.css') }}">

  </head>
  <body>




    <header class="masthead">
      <div class="container">
        <a href="/" title="Go to home page" rel="home" class="site-title">
          @include('inc.logo')
          <span>The People’s Plan</span></a>
        <nav class="site-navigation site-navigation--primary">
          <a href="/ideas/">the ideas</a>
          <a href="/interviews/">viewpoints</a>
        </nav>
        <nav class="site-navigation right">

            @if (Auth::guest())
              <a class="button" href="{{ url('/login') }}">Login</a>
            @else
              <a class="button" href="/ideas/add/">Add your idea</a>

              <button class="button text navigation-account dropdown" href="#">
                <div class="avatar">
                  @include('inc.avatar', ['user' => Auth::user() ])
                </div>
                <span class="navigation-account-name">
                  {{ Auth::user()->name }}
                </span>
              </button>
              <div class="navigation-account-menu" tabindex="-1">
                @if(Auth::user()->is_admin)
                  <a class="button text" href="/admin/">Admin</a>
                @endif
                <a class="button text" href="/user/ideas">My ideas</a>
                <a class="button text" href="/user/preferences">Preferences</a>
                <a class="button text" href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>


            @endif
        </nav>
      </div>
    </header>

    <div class="flash-message">
      <div class="container">
        @include('flash::message')
      </div>
    </div>


    <main>
      @yield('content')
    </main>

    <footer class="site-footer">
      <div class="container">
        <h2 class="footer-title">The People’s Plan</h2>
        <p>The People’s Plan for Digital is developed and promoted by <a href="http://liambyrne.co.uk/" target="_blank">Liam Byrne MP</a>. &copy; 2017-2018</p>
      </div>
      <nav class="footer-menu">
        <a href="/privacy">Privacy policy</a>
        <a href="/terms">Terms &amp; conditions</a>
        <a href="http://github.com/johnpuddephatt/peoplesplan/issues">Report an issue</a>
      </nav>
    </footer>
  </body>

  <script type="text/javascript">
  var APP_URL = {!! json_encode(url('/')) !!}
  </script>

  <script type="text/javascript" src="{{mix ('/js/app.js')}}"></script>

</html>