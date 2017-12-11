@extends('layouts.app')

@section('content')

  <div class="container container--login">
  <div class="panel panel--login">
    <div class="column column--sign-in">

        <h1>{{ session('redirectTo')}}</h1>

      <h1 class="panel-heading">Sign in</h1>

      <div class="form-group form-group--social">
        <a href="{{ url('/auth/twitter') }}" class="button button--social button--twitter">Sign in with Twitter</a>
        <a href="{{ url('/auth/facebook') }}" class="button button--social button--facebook">Sign in with Facebook</a>
      </div>

      <form method="POST" action="{{ route('login') }}" class="login-form">
        {{ csrf_field() }}
        @if ($errors->has('loginfailed'))
          <div class="help-block">
            <strong>{{ $errors->first('loginfailed') }}</strong>
          </div>
        @endif
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="control-label">E-Mail Address</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="control-label">Password</label>
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group form-group--remember">
          <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
          </label>
        </div>

        <input type="hidden" name="redirect" value="{{ Request::get('redirectTo') ?: URL::previous() }}">

        <div class="form-group">
          <a class="button text" href="{{ route('password.request') }}">
            Forgot Your Password?
          </a>
          <button type="submit" class="button primary button--submit">Login</button>

        </div>
      </form>
      <p class="login-terms">By signing up you agree to our <a href="/terms">Terms &amp; Conditions</a></p>
    </div>
    <div class="column column--sign-up">
      <h2 class="side-panel-heading">No account yet?</h2>
      <p>Creating a new account takes seconds.</p>
      <a href="/register" class="button block">Sign up</a>
    </div>
  </div>
</div>
@endsection
