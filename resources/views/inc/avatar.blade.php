@if ($user->avatar)
  <img src="{{ $user->avatar }}" alt="User {{ $user->name }}’s avatar" >
@else
  <img src="{{ Gravatar::get($user->email) }}" alt="User {{ $user->name }}’s avatar">
@endif
