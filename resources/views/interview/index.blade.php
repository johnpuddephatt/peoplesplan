@extends('layouts.app')

@section('content')

  <div class="container container--interview-index">
    <h1 class="page-title">Viewpoints</h1>
    <p>How does the UK become the world’s most advanced digital society?</p>

    <div class="interview-card-list">
    @foreach ($interviews as $interview)
      @include('interview.card')
    @endforeach
    </div>

    @if(!$interviews->count())
      <div class="alert">
        No interviews to show you currently
      </div>
    @endif

  </div>

@stop