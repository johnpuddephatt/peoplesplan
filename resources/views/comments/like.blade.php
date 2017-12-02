{{-- @php dd($comments) @endphp --}}

<div class="laravel-like">
	<i id="{{ $like_item_id }}-like"
	   class="icon {{ $likedata['likeDisabled'] }} {{ $likedata['likeIconOutlined'] }} like-icon thumbs up"
	   data-itemid="{{ $like_item_id }}"
	   data-vote="1">
		 @include('inc/icon-thumb')
    </i>
	<span id="{{ $like_item_id }}-total-like">{{ $likedata['total_like'] }}</span>
	<i id="{{ $like_item_id }}-dislike"
	   class="icon {{ $likedata['likeDisabled'] }} {{ $likedata['dislikeIconOutlined'] }} like-icon thumbs down"
	   data-itemid="{{ $like_item_id }}"
	   data-vote="-1">
		 @include('inc/icon-thumb')
   </i>
   <span id="{{ $like_item_id }}-total-dislike">{{ $likedata['total_dislike'] }}</span>
</div>