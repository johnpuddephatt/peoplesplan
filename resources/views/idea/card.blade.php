<div class="card card--idea">
    <div class="avatar card-avatar">
      @include('inc.avatar',['user' => $idea->user])
      <div class="card-avatar-name">
        {{ $idea->user->name }}
      </div>
      <div class="card-meta">Submitted {{ $idea->created_at->diffForHumans() }} on {{ date('jS F Y', strtotime($idea->created_at)) }}</div>

    </div>
    <a href="/ideas/{{ $idea->slug }}" class="card-body">

      <h2 class="card-title">{{$idea->title}}</h2>

    </a>
    <div class="card-footer">
      <a class="card-comments" href="/ideas/{{ $idea->slug }}#comments">{{ $idea->comments_count }} comments</a>
      @include('comments.like', ['like_item' => $idea])
    </div>
</div>