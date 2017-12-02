@php
  ++$comment_level
@endphp
<div class="comment" id="comment-{{ $comment->id }}">
  <a class="avatar">
    <img src="{{ $comment->avatar }}">
    @if ($comment->is_admin)
      <span class="badge badge--admin">Admin</span>
    @endif
  </a>
  <div class="content">
    <span class="author">{{ $comment->name }}</span>
    <div class="metadata">
      <span class="date" title="{{ date('g:ia, jS F Y', strtotime($comment->updated_at)) }}">{{ $comment->updated_at->diffForHumans() }}</span>
    </div>
    <div class="text">
      {{ $comment->comment }}
    </div>
      <div class="actions">
        @include('comments.like', ['like_item_id' => 'comment-'.$comment->id, 'likedata' => $comment->likes])
        @if(Auth::check() && !Auth::user()->is_blocked && ($comment_level < 3))
          <a class="reply reply-button" data-toggle="{{ $comment->id }}-reply-form">Reply</a>
        @endif
      </div>

    @if(Auth::check() && !Auth::user()->is_blocked)
      <form id="{{ $comment->id }}-reply-form" class="comment-form form" data-parent="{{ $comment->id }}" data-item="{{ $comment->item_id }}" style="display: none;">
        <div class="avatar">
          <img src="{{ Auth::user()->avatar }}" />
        </div>
        <textarea id="{{ $comment->id }}-textarea" rows="2" placeholder="Enter your reply"></textarea>
        <input type="submit" class="button" value="Comment">
      </form>
    @endif
    @if($comment_level <= 3)
      <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">
        @foreach ($comments as $child)
          @if($child->parent_id == $comment->id)
            @include('comments.single', ['comment' => $child])
          @endif
        @endforeach
      </div>
    @endif
  </div>
</div>