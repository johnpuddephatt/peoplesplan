  <a href="/interviews/{{ $interview->slug }}" class="interview-card">
    <div class="interview-card-image">
      <img  src="{{ $interview->thumb }}" alt="Video thumbnail showing {{$interview->name}}">
      @include("inc.playbutton")
    </div>
    <p class="interview-card-quote">{{ $interview->quote }}</p>
    <div class="interview-card-footer">
      <h3 class="interview-card-title">{{ $interview->name }}</h3>
      <div class="interview-card-commentcount">{{ $interview->comments_count }} comments</div>
    </div>
  </a>