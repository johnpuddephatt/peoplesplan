@extends('layouts.app')

@section('content')
  <div class="container container--ideas">
    <h1 class="page-title">Your ideas</h1>

    @if ($ideas->count())
      <h2 class="section-title">Your approved ideas</h2>
      <p>The following ideas are currently live on the site for people to discuss.</p>

      @foreach($ideas as $idea)
        @include('idea.card')
      @endforeach
    @endif

    @if ($pending_ideas->count())
      <h2 class="section-title">Your pending ideas</h2>
      <p>The following ideas have been submitted but are awaiting moderator approval.</p>
      @foreach($pending_ideas as $idea)
        @include('idea.card')
      @endforeach
    @endif

    @if (!$pending_ideas->count() && !$ideas->count())
    <div class="alert">
      You have no ideas published at this time.
    </div>
    @endif

  </div>
@stop