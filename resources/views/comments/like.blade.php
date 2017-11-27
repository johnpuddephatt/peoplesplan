{{-- @php dd($comments) @endphp --}}

<div class="laravel-like">
	<i id="{{ $like_item_id }}-like"
	   class="icon {{ $comment->likes['likeDisabled'] }} {{ $comment->likes['likeDisabled'] }} laravelLike-icon thumbs up"
	   data-itemid="{{ $like_item_id }}"
	   data-vote="1">
		 @include('inc/icon-thumb')
    </i>
	<span id="{{ $like_item_id }}-total-like">{{ $comment->likes['total_like'] }}</span>
	<i id="{{ $like_item_id }}-dislike"
	   class="icon {{ $comment->likes['likeDisabled'] }} {{ $comment->likes['dislikeIconOutlined'] }} laravelLike-icon thumbs down"
	   data-itemid="{{ $like_item_id }}"
	   data-vote="-1">
		 @include('inc/icon-thumb')
   </i>
   <span id="{{ $like_item_id }}-total-dislike">{{ $comment->likes['total_dislike'] }}</span>
</div>