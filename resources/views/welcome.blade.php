@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="panel">

      <h1>Welcome on board!</h1>
      @if ($user->login_count == 1)
        <h3>this is your first visit!</h3>
      @endif

    </div>
  </div>
@stop