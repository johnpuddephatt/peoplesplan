<div class="card card--idea">
  <div class="card-body">
    <a href="/ideas/{{ $idea->slug }}">
      <h2 class="card-title">{{$idea->title}}</h2>
    </a>
    @include('comments.like', ['like_item' => $idea])
  </div>
  <div class="card-footer">

    <div class="avatar card-avatar">
      @include('inc.avatar',['user' => $idea->user])
      <div class="card-avatar-name">
        {{ $idea->user->name }} <span class="card-meta">Submitted {{ $idea->created_at->diffForHumans() }}{{-- on {{ date('jS F Y', strtotime($idea->created_at)) }}--}}</span>
      </div>
    </div>
    <a class="card-comments" href="/ideas/{{ $idea->slug }}#comments">{{ $idea->comments_count }} comments</a>



  </div>
</div>