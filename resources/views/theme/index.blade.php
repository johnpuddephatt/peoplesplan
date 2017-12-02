@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Hello these are the themes</h1>
    <ul class="container">
      @foreach ($themes as $theme)
        <li><a href="/themes/{{ $theme->slug }}">{{$theme->title}}</a></li>
      @endforeach
    </ul>
  </div>
@stop