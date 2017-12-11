@extends('layouts.app')

@section('content')

<header class="theme-header">
  <div class="container container--theme">
    <div class="theme-icon">
      <img src="/{{ $theme->icon }}" />
    </div>
    <div class="theme-summary">
      <div class="theme-date">
        {{$theme->getMonth()}}
      </div>
      <h1 class="theme-title">{{ $theme->title }}</h1>
      <div class="theme-description">
        {!! $theme->description !!}
      </div>
    </div>
  </div>
</header>

<div class="container container--theme-ideas">


  @if (Auth::guest())
    <div class="alert">
      Please sign in to post your idea.
    </div>
  @elseif (Auth::user()->is_blocked)
    <div class="alert">
      Your account has been temporarily suspended for contravening our community guidelines. Please try again later or contact us for more information.
    </div>
  @else

    <div class="idea-form">
      <form method="POST" action="/themes/new/{{ Hashids::encode(Auth::user()->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="panel-heading">Add your idea</h3>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="form-group">
          <label for="ideatitle">Your idea</label>
          <input id="ideatitle" name="title" class="form-control" placeholder="Your idea" value="{{ old('title') }}"/>
        </div>

        <div class="form-group">
          <label for="ideawhat">Tell us <strong>what</strong> you think should happen</label>
          <textarea id="ideawhat" rows="6" name="description_what" class="form-control" placeholder="Your idea">{{ old('description_what') }}</textarea>
        </div>

        <div class="form-group">
          <label for="ideawhy">Tell us <strong>why</strong> you think this should happen?</label>
          <textarea id="ideawhy" rows="6" name="description_why" class="form-control" placeholder="Your idea">{{ old('description_why') }}</textarea>
        </div>

        <input name="theme_id" value="{{ $theme->id }}" type="hidden">
        <input name="author_id" value="{{ Hashids::encode(Auth::user()->id) }}" type="hidden">

        <div class="form-group">
          <button type="submit" class="button">Add your idea</button>
        </div>
      </form>
      <div class="ideas-guidelines">
        <h2>Guidelines</h2>
        <ul>
          <li><strong>Keep it brief</strong> – smaller ideas are better than long ideas </li>
          <li><strong>Keep it clear</strong> – try to explain your idea as simply as possible</li>
          <li><strong>Keep it friendly</strong> – your idea must follow our <a href="/terms/">community guidelines</a></li>
        </ul>
     </div>
    </div>
  @endif
  <div class="card-list">
    @foreach ($ideas as $idea)
      {{-- <a class="card card--idea" href="/ideas/{{ $idea->slug }}">

        <h2 class="idea-title">{{$idea->title}}</h2>
        <img src="{{ $idea->avatar }}" class="card-avatar">
        <span>{{$idea->commentTotal()}} comments</span>
        @include('comments.like', ['like_item_id' => 'idea-'.$idea->id, 'likedata' => $idea->likes])

      </a> --}}
      @include('idea.card')

    @endforeach
  </div>
</div>



@stop
