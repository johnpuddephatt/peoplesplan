<div class="like-container">

	<span id="{{ $like_item->id }}-{{ get_class($like_item) }}-like-total" class="like-total">{{ sprintf("%+d",$like_item->likes->sum('vote')) }}</span>

	<i id="{{ $like_item->id }}-{{ get_class($like_item) }}-like"
		{{-- class="@if(Auth::check())enabled @if($like_item->likes->where('user_id',Auth::User()->id)->where('vote','1')->first())active @endif @endif icon like-icon thumbs up" --}}
		class="enabled @if(Auth::check()) @if($like_item->likes->where('user_id',Auth::User()->id)->where('vote','1')->first())active @endif @endif icon like-icon thumbs up"
		data-type="{{get_class($like_item)}}"
	  data-id="{{ $like_item->id }}"
	  data-vote="1">
		@include('inc/icon-thumb')
    </i>
	{{-- <span id="{{ $like_item->id }}-{{ get_class($like_item) }}-total-like">+{{ $like_item->likes->where('vote',1)->sum('vote') }}</span> --}}

	<i id="{{ $like_item->id }}-{{ get_class($like_item) }}-dislike"
	  class="enabled @if(Auth::check()) @if($like_item->likes->where('user_id',Auth::User()->id)->where('vote','-1')->first())active @endif @endif icon like-icon thumbs down"
		data-type="{{get_class($like_item)}}"
		data-id="{{ $like_item->id }}"
	  data-vote="-1">
		@include('inc/icon-thumb')
  </i>
  {{-- <span id="{{ $like_item->id }}-{{ get_class($like_item) }}-total-dislike">-{{ abs($like_item->likes->where('vote',-1)->sum('vote')) }}</span> --}}

</div>
