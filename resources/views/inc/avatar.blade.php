@if ($user->avatar)
  <img src="{{ $user->avatar }}" alt="User {{ $user->name }}’s avatar" >
@elseif ($user->gravatar)
  <img src="{{ Gravatar::get($user->email) }}" alt="User {{ $user->name }}’s avatar">
@else
  <img src="/images/default-avatar.png" alt="Default avatar in use for {{ $user->name }}">
@endif
