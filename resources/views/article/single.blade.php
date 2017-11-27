@extends('layouts.app')

@section('content')
  
  <div class="container">

    <h1>{{ $article->title }}</h1>
    {!! $article->body !!}

    {{-- @include('comments.comment', ['comment_item_id' => 'article-' . $article->id]) --}}
    @include('comments.list')

  </div>
@stop