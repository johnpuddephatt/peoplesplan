@extends('layouts.app')

@section('content')
  <div class="container container--articles">
    <h1 class="page-title">Articles</h1>
    <div class="article-card--list">
      @foreach ($articles as $article)
        @include('article.card')
      @endforeach
    </div>
  </div>
@stop