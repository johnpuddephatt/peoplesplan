
<div class="comment" id="comment-{{ $comment->id }}">
  <a class="avatar">
      <img src="{{ $comment->avatar }}">
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
        <a class="reply reply-button" data-toggle="{{ $comment->id }}-reply-form">Reply</a>
    </div>

    @include('comments.like', ['like_item_id' => 'comment-'.$comment->id])


    @if(!Auth::check())
      <div class="alert">Please Log in to comment</div>
    @else
      <form id="{{ $comment->id }}-reply-form" class="ui laravelComment-form form" data-parent="{{ $comment->id }}" data-item="{{ $comment->item_id }}" style="display: none;">
          <div class="field">
                <textarea id="{{ $comment->id }}-textarea" rows="2"></textarea>
          </div>
          <input type="submit" class="button" value="Comment">
      </form>
    @endif
    <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">

      @foreach ($comments as $child)
        @if($child->parent_id == $comment->id)
          @include('comments.single', ['comment' => $child])
        @endif
      @endforeach
    </div>

  </div>
</div>