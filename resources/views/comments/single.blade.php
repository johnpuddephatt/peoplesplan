@php
  ++$comment_level
@endphp
<div class="comment" id="comment-{{ $comment->id }}">

  <a class="avatar">
    @include('inc.avatar',['user' => $comment->user])
    @if ($comment->user['admin'])
      <span class="badge badge--admin">Admin</span>
    @endif
  </a>
  <div class="content">
    <div class="actions">
      @include('comments.like', ['like_item' => $comment])
      @if(Auth::check() && !Auth::user()->is_blocked && ($comment_level < 3))
        <a class="reply reply-button" data-toggle="{{ $comment->id }}-reply-form">Reply</a>
      @endif
    </div>
    <span class="author">{{ $comment->user['name'] }}</span>
    <div class="metadata">
      <span class="date" title="{{ date('g:ia, jS F Y', strtotime($comment->updated_at)) }}">{{ $comment->updated_at->diffForHumans() }}</span>
    </div>
    <div class="text">
      {{ $comment->comment }}
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
      <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">
        @foreach ($comment_item->comments as $child)
          @if($child->parent_id == $comment->id)
            @include('comments.single', ['comment' => $child])
          @endif
        @endforeach
      </div>
    @endif
  </div>
</div>