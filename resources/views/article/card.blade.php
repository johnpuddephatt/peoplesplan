<a href="/articles/{{ $article->slug }}" class="card article-card--item">
  <img class="article-card--image" src="{{ $article->image }}" alt="Article thumbnail for {{$article->title}}">

  <div class="article-card--body">
    <div class="article-card--title">{{$article->title}}</div>
    {{-- <div class="article-card--excerpt">{{ Str::words(strip_tags($article->body),25) }}</div> --}}
  </div>
  <div class="article-card--footer">
    <div class="article-card--date">Posted {{ $article->created_at->diffForHumans() }}</div>
    <div class="article-card-commentcount">{{ $article->comments_count }} comments</div>
  </div>
</a>