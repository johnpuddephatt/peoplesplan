@extends('layouts.app')

@section('content')

  <header class="idea-header">
    <div class="container container--idea">
    <div class="idea-content">
      <h1 class="idea-title">{{ $idea->title }}</h1>
      <div class="theme-description">
        <h3>What</h3>
        {!! $idea->description_what !!}
        <h3>Why</h3>
        {!! $idea->description_why !!}
      </div>
      <div class="interview-likes">
        @include('comments.like')
      </div>

    </div>
  </div>
</header>

<div class="container container--comments" id="comments">
  @include('comments.list')
</div>


@stop