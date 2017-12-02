@extends('layouts.app')

@section('content')
<div class="container container--add">


  @if (Auth::user()->is_blocked)
    <div class="alert">
      Your account has been temporarily suspended for contravening our community guidelines. Please try again later or contact us for more information.
    </div>
  @else
    <div class="idea-form">
      <form method="POST" action="/themes/new/{{ Hashids::encode(Auth::user()->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="panel-heading">Add your idea</h3>

        <div class="form-group">
          <label for="ideatitle">Your idea</label>
          <input id="ideatitle" name="title" class="form-control" placeholder="Your idea"/>
        </div>

        <div class="form-group">
          <label for="ideawhat">Explain what you think should happen</label>
          <textarea id="ideawhat" rows="6" name="description_what" class="form-control" placeholder="Your idea"></textarea>
        </div>

        <div class="form-group">
          <label for="ideawhy">Explain why you think this should happen?</label>
          <textarea id="ideawhy" rows="6" name="description_why" class="form-control" placeholder="Your idea"></textarea>
        </div>

        <div class="form-group">
          <label for="themeid">Theme the idea relates to</label>
          <select id="themeid" name="theme_id">
          @foreach ($themes as $theme)
            <option value="{{ $theme->id }}">{{ $theme->title}}</option>
          @endforeach
          </select>
        </div>
        <input name="author_id" value="{{ Hashids::encode(Auth::user()->id) }}" type="hidden">

        <div class="form-group">
          <button type="submit" class="button">Add your idea</button>
        </div>
      </form>
      <div class="ideas-guidelines">
        <h2>Guidelines</h2>
        <p>Ideas will be reviewed by a moderator before appearing on the site. Ideas not meeting our community guidelines will not be approved.</p>
      </div>
    </div>
  @endif
</div>
@stop