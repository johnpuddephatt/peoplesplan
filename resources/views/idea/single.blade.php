@extends('layouts.app')

@section('content')

  <header class="idea-header">
    <div class="container container--idea">
    <div class="idea-content">
      <p>Theme: {{$idea->theme->title}}</p>

      <div class="avatar">
        {{-- @include('inc.avatar',['user' => $idea->user]) --}}
        {{$idea->user->name }}
      </div>

      <h1 class="idea-title">{{ $idea->title }}</h1>
      <div class="theme-description">
      </div>
      <div class="idea-likes">
        @include('comments.like', ['like_item' => $idea])
      </div>

    </div>
  </div>
</header>

<div class="container container--idea-details">
  <h2>What</h2>
  {!! $idea->description_what !!}
  <h2>Why</h2>
  {!! $idea->description_why !!}
</div>


<div class="container container--comments" id="comments">
  @include('comments.list', ['comment_item' => $idea])
</div>


@stop