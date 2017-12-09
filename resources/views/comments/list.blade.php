<div class="comment-container" id="comment-{{ get_class($comment_item)}}-{{$comment_item->id}}">
    <h3 class="comments-header">Join the discussion</h3>

    @if(!Auth::check())
      <div class="alert">
        Please <a href="/login">log in</a> to comment.
      </div>
    @else
      <form class="comment-form form" id="{{ $comment_item->id }}-comment-form" data-parent="0" data-type="{{get_class($comment_item)}}" data-id="{{ $comment_item->id }}">
        <div class="avatar">
          @include('inc.avatar',['user' => Auth::user()])
        </div>
        <textarea id="0-textarea" rows="2" placeholder="What do you think?"></textarea>
        <input type="submit" class="button" value="Post comment">
      </form>
    @endif

    <div class="comments" id="{{ $comment_item->id }}-comment-0">

      @foreach ($comment_item->comments as $comment)

        @if($comment->parent_id == 0)
          @include('comments.single',['comment_level' => 0])
        @endif

      @endforeach

    </div>
</div>



