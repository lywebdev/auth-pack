<?php

namespace App\Listeners\Auth;

use App\Notifications\Auth\ThanksVerifiedNotification;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VerifiedEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(Verified $event)
    {
        $event->user->notify(new ThanksVerifiedNotification());
    }
}
