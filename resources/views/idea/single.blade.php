@extends('layouts.app')

@section('content')

  <header class="idea-header">
    <div class="container container--idea">
      <div class="avatar">
        @include('inc.avatar',['user' => $idea->user])
        <div class="avatar-name">
          {{$idea->user->name }}
        </div>
      </div>
      <div class="idea-intro">
        <div class="idea-theme">{{$idea->theme->title}}:</div>
        <h1 class="idea-title">{{ $idea->title }}</h1>
        <div class="idea-likes">
          @include('comments.like', ['like_item' => $idea])
        </div>
      </div>
    </div>
  </header>

<div class="container container--idea-details">
  <div class="card">
    <h2>What</h2>
    {!! $idea->description_what !!}
  </div>
  <div class="card">
    <h2>Why</h2>
    {!! $idea->description_why !!}
  </div>
</div>


<div class="container container--comments" id="comments">
  @include('comments.list', ['comment_item' => $idea])
</div>


@stop