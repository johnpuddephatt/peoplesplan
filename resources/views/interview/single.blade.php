@extends('layouts.app')

@section('content')

<header class="interview-header">
  <div class="container container--interview">
    <div class="interview-content">

      <div class="interview-video">
        {!! $interview->code  !!}
      </div>

      <div class="interview-likes">
        @include('comments.like')
      </div>

      <h1 class="interview-quote">{{ $interview->quote }}</h1>
      <h2 class="interview-name">{{ $interview->name }}</h2>



    </div>
  </div>
</header>

<div class="container">
  {{ $interview->description }}
</div>

<div class="container container--comments" id="comments">
  @include('comments.list')
</div>

@stop