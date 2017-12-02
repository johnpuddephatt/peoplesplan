<?php

namespace App\Listeners;

use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;

class LastLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Update user last login date/time
        $event->user->increment('login_count');
    }
}