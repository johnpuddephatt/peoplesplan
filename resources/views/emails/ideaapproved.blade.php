@component('mail::message')

# Hello {{ $idea->user->name }}

Your idea has been approved and can now be commented and voted on. You’ll be notified by email when anyone comments on your idea.

@component('mail::button', ['url' => url('ideas/'.$idea->slug) ])

View your idea

@endcomponent


Regards,
The People's Plan

@endcomponent

