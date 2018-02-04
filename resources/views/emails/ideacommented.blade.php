@component('mail::message')

# Hello {{ $idea->user->name }}

Your idea has been commented on!

“{{ $comment->comment }}”

@component('mail::button', ['url' => url('ideas/'.$idea->slug) ])

View your idea

@endcomponent


Regards,
The People's Plan

@endcomponent