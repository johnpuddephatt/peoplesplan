<a href="/articles/{{ $article->slug }}" class="card article-card--item">
  <div class="article-card--body">
    <div class="article-card--title">{{$article->title}}</div>
    <div class="article-card--excerpt">{{ Str::words(strip_tags($article->body),25) }}</div>
  </div>
  <div class="article-card--footer">
    <div class="article-card--date">Posted {{ $article->created_at->diffForHumans() }} on {{ date('jS F Y', strtotime($article->created_at)) }}</div>
  </div>
</a>