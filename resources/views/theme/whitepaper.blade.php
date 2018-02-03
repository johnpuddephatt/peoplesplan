@extends('layouts.app')

@section('content')

<header class="theme-header">
  <div class="container container--theme">
    <div class="theme-icon">
      <img src="/{{ $theme->icon }}" />
    </div>
    <div class="theme-summary">
      <div class="draft-title">Draft plan</div>
      <h1 class="theme-title">{{ $theme->title }}</h1>
      <div class="draft-description">Draft plans are taking shape based on your ideas. Add your views to help shape the final plan that will be presented to Parliament.</div>
      <a class="button draft-pdf" href="{{ $theme->whitepaper_file }}">Download this draft plan</a>
    </div>
  </div>
</header>


<div class="container container--whitepaper">
  <div class="whitepaper-wrapper">
    <div class="whitepaper-title">{{ $theme->whitepaper_title }}</div>
    <div class="whitepaper-body-summary">{{ $theme->whitepaper_summary }}</div>
    <div class="whitepaper-body">
      {!! $theme->whitepaper_body !!}
    </div>
  </div>
</div>



<div class="container container--comments" id="comments">
  @include('comments.list', ['comment_item' => $theme])
</div>



@stop
