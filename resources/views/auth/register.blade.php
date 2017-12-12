@extends('layouts.app')

@section('content')
<div class="container container--login">
  <div class="panel panel--login">
    <div class="column column--sign-in">
      <h1 class="panel-heading">Register</h1>
      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        @if ($errors->has('registrationfailed'))
          <div class="help-block">
            <strong>{{ $errors->first('registrationfailed') }}</strong>
          </div>
        @endif
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name" class="control-label">Name</label>
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
          @if ($errors->has('name'))
            <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="control-label">E-Mail Address</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-md-4 control-label">Password</label>
          <input id="password" type="password" class="form-control" name="password" required>
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group">
          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group form-group--gravatar">
          <label>
            <input type="checkbox" value="1" name="gravatar" {{ old('gravatar') ? 'checked' : '' }}> Use <a href="https://en.gravatar.com/" target="_blank">Gravatar</a>
          </label>
           <a href="/privacy#gravatar" class="help-icon">What does this mean?</a>
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <p class="login-terms">By signing up you agree to our <a href="/terms">Terms &amp; Conditions</a></p>
    </div>
    <div class="column column--sign-up">

      <h2 class="side-panel-heading">Or sign up with an existing account</h2>

      <a href="{{ url('/auth/twitter') }}" class="button button--social button--twitter block">Sign up with Twitter</a>
      <a href="{{ url('/auth/facebook') }}" class="button button--social button--facebook block">Sign up with Facebook</a>




    </div>
  </div>
</div>
@endsection