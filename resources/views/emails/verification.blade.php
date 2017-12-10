@component('mail::message')

# Hello {{ $user->name }}!

Thank you for creating a People's Plan account. You're just one step away from joining the debate.

Click the button below to verify your email address and start helping to plan the most advanced digital society in the world.

  @component('mail::button', ['url' => url('register/verify/'.$user->email_token) ])

  Verify your email

  @endcomponent

Regards,
The People's Plan

@endcomponent

