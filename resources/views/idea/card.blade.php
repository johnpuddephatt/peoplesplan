<a class="card card--idea" href="/ideas/{{ $idea->slug }}">
  <div class="avatar card-avatar">
    <img src="{{ $idea->avatar }}" class="card-avatar">
  </div>
  <div class="card-body">
    <h2 class="card-title">{{$idea->title}}</h2>
  </div>
  <div class="card-meta">
    @include('comments.like', ['like_item_id' => 'idea-'.$idea->id, 'likedata' => $idea->likes])
    <span class="card-comments">{{$idea->commentTotal()}} comments</span>
  </div>
</a>