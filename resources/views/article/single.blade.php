@extends('layouts.app')

@section('content')

  <div class="container container--article">
    <div class="article-content">
      <header class="article-header">
        <h1 class="article-title">{{ $article->title }}</h1>
        <p>Posted {{ $article->created_at->diffForHumans() }} on {{ date('jS F Y', strtotime($article->created_at)) }}</p>
        <div class="idea-likes">
          @include('comments.like', ['like_item' => $article])
        </div>

      </header>
      <div class="article-body">
        {!! $article->body !!}
      </div>
    </div>
    <div class="container container--comments" id="comments">
      @include('comments.list', ['comment_item' => $article])
    </div>

  </div>
@stop