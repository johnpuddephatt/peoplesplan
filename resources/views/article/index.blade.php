@extends('layouts.app')

@section('content')
  <div class="container container--articles">
    <h1 class="page-title">Articles</h1>
    <div class="article-card--list">
      @foreach ($articles as $article)
        @include('article.card')
      @endforeach
    </div>
    @if(!$articles->count())
      <div class="alert">
        No articles to show you currently
      </div>
    @endif
  </div>
@stop