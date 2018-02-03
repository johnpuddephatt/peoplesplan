@php
  ++$comment_level
@endphp
<div class="comment" id="{{ $comment_item->id }}-comment-{{ $comment->id }}">

  <a class="avatar">
    @include('inc.avatar',['user' => $comment->user])
    @if ($comment->user['admin'])
      <span class="badge badge--admin">Admin</span>
    @endif
  </a>
  <div class="content">
    <span class="author">{{ $comment->user['name'] }}</span>
    <div class="metadata">
      <span class="date" title="{{ date('g:ia, jS F Y', strtotime($comment->updated_at)) }}">{{ $comment->updated_at->diffForHumans() }}</span>
    </div>
    <div class="comment-text">
      {{ $comment->comment }}
    </div>
    <div class="actions">
      @include('comments.like', ['like_item' => $comment])
      @if(Auth::check() && !Auth::user()->is_blocked && ($comment_level < 3))
        <button class="reply reply-button text" data-toggle="{{ $comment->id }}-reply-form">Reply</button>
        <a class="report report-button button text" href="mailto:mail@peoplesplan.co.uk?subject=Comment #{{$comment->id}} on People's Plan reported&body=Comment ID: {{$comment->id }}%0D%0AParent item ID: {{ $comment->parent_id}}%0D%0A====================%0D%0AReason for reporting comment: %0D%0AYour name:">Report</a>
      @endif
    </div>

    @if(Auth::check() && !Auth::user()->is_blocked)
      <form id="{{ $comment->id }}-reply-form" class="comment-form form" data-parent="{{ $comment->id }}" data-type="{{get_class($comment_item)}}" data-id="{{ $comment_item->id }}" style="display: none;">
        <div class="avatar">
          @include('inc.avatar',['user' => Auth::user()])
        </div>
        <textarea id="{{ $comment->id }}-textarea" rows="2" placeholder="Enter your reply" autofocus></textarea>
        <input type="submit" class="button" value="Post comment">
      </form>
    @endif
    @if($comment_level <= 3)
      <div class="comments" id="{{ $comment_item->id }}-comments-{{ $comment->id }}">
        @foreach ($comment_item->comments as $child)
          @if($child->parent_id == $comment->id)
            @include('comments.single', ['comment' => $child])
          @endif
        @endforeach
      </div>
    @endif
  </div>
</div>