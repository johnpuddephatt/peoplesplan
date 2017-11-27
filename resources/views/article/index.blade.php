@extends('layouts.app')

@section('content')

  <ul class="container">
    @foreach ($articles as $article)
      <li><a href="/blog/{{ $article->slug }}">{{$article->title}}</a></li>
    @endforeach
  </ul>

@stop