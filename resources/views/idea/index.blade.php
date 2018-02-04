@extends('layouts.app')

@section('content')
  <div class="container container--ideas">
    <h1 class="page-title">See all ideas</h1>
      <nav>
        <a href="/ideas/by/created_at">Most recent</a>
        <a href="/ideas/by/likes_count">Most liked</a>
        <a href="/ideas/by/comments_count">Most commented</a>
      </nav>
    <div class="idea-card-list">
      @foreach ($ideas as $idea)
        @include('idea.card')
      @endforeach
    </div>
  </div>
@stop