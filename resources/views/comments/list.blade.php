<div class="laravelComment" id="laravelComment-{{ $comment_item_id }}">
    <h3 class="comments-header">Join the discussion</h3>

    @if(!Auth::check())
      <div class="alert">
        Please <a href="/login">log in</a> to comment.
      </div>
    @else
      <form class="comment-form form" id="{{ $comment_item_id }}-comment-form" data-parent="0" data-item="{{ $comment_item_id }}">
        <div class="avatar">
          <img src="{{ Auth::user()->avatar }}" />
        </div>
        <textarea id="0-textarea" rows="2" placeholder="What do you think?"></textarea>
        <input type="submit" class="button" value="Comment">
      </form>
    @endif

    <div class="comments" id="{{ $comment_item_id }}-comment-0">

      @foreach ($comments as $comment)
        @if($comment->parent_id == 0)
          @include('comments.single',['comment_level' => 0])
        @endif

      @endforeach

    </div>
</div>



