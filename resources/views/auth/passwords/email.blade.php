@extends('layouts.app')

@section('content')
<div class="container container--login">
  <div class="panel panel--login">
    <div class="column column--sign-in">

      <h1 class="panel-heading">Reset Password</h1>
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <form method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="control-label">E-Mail Address</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
