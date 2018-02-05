@extends('layouts.app')

@section('content')
  <div class="container container--ideas">
    <h1 class="page-title">See the ideas</h1>
    <p>Ideas are divided into themes.</p>
    <div class="theme-card-list">
      @foreach ($themes as $theme)
        <a href="/themes/{{$theme->slug}}" class="card theme-card-item theme-card-item--{{ str_slug($theme->title) }}">
          <img src="{{$theme->icon}}" class="theme-card-item-icon" alt="">
          <div class="card-inner">
            <h3 class="card-title theme-card-item-title">
              {{ $theme->title }}
            </h3>
            <p>{{ $theme->description }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@stop