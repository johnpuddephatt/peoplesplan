@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="panel panel--login">
      <div class="column">
        <h1 class="panel-heading">User settings</h1>
        <form class="form-horizontal" method="POST" action="/user/preferences/update">
          {{ csrf_field() }}
          <h2>Privacy settings</h2>
          <div class="form-group form-group--contactable">
            <label>
              <input type="checkbox" name="preference_contactable" {{ $preference_contactable ? 'checked' : '' }}> Contact me by email with information relating to the People’s Plan
            </label>
          </div>
          <div class="form-group form-group--gravatar">
            <label>
              <input type="checkbox" name="preference_gravatar" {{ $preference_gravatar ? 'checked' : '' }}> Use <a href="/privacy#gravatar" class="help-icon">Gravatar</a> to load my profile image (does not apply to social logins)
            </label>
          </div>
          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update my preferences</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@stop