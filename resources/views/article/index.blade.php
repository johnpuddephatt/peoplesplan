@extends('layouts.app')

@section('content')

<h1>Hello these are the articles</h1>
  <ul class="container">
    @foreach ($articles as $article)
      <li><a href="/blog/{{ $article->slug }}">{{$article->title}}</a></li>
    @endforeach
  </ul>

@stop