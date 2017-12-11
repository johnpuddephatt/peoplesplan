@extends('layouts.app')

@section('content')
  <div class="container container--ideas">
    <h1 class="page-title">See all ideas</h1>
    <div class="idea-card-list">


      @foreach ($themes as $theme)
        @if (strtotime($theme->date) < time())
        <h2 class="section-title">{{$theme->title}}</h2>
          @foreach ($ideas->where('theme_id', $theme->id) as $idea)
            @include('idea.card')
          @endforeach
        @endif
      @endforeach
    </div>
  </div>
@stop