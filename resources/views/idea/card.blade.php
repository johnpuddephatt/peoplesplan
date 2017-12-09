<div class="card card--idea">
  <a href="/ideas/{{ $idea->slug }}">
    <div class="avatar card-avatar">
      @include('inc.avatar',['user' => $idea->user])
      <span>{{$idea->user['name']}}</span>
    </div>
    <div class="card-body">
      <h2 class="card-title">{{$idea->title}}</h2>
    </div>
  </a>
  <div class="card-meta">
    @include('comments.like', ['like_item' => $idea])
    <span class="card-comments">{{ $idea->comments_count }} comments</span>
  </div>
</div>