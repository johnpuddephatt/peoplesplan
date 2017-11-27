<div class="laravelComment" id="laravelComment-{{ $comment_item_id }}">
    <h3 class="ui dividing header">Comments</h3>

    @if(!Auth::check())
      <small>Please Log in to comment</small>
    @else
      <form class="ui laravelComment-form form" id="{{ $comment_item_id }}-comment-form" data-parent="0" data-item="{{ $comment_item_id }}">
        <div class="field">
          <textarea id="0-textarea" rows="2"></textarea>
        </div>
        <input type="submit" class="button" value="Comment">
      </form>
    @endif

    <div class="ui threaded comments" id="{{ $comment_item_id }}-comment-0">

      @foreach ($comments as $comment)
        @if($comment->parent_id == 0)
          @include('comments.single')
        @endif

      @endforeach

    </div>
</div>



