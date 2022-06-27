<?php

namespace App\Listeners;

use App\Notifications\PasswordResetSeccesfuly;
use App\Events\PasswordReset;

class PasswordResetMail
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

    /**
     * @param PasswordReset $event
     */
    public function handle(PasswordReset $event)
    {
     //   dd($event->user);
        $event->user->notify(new PasswordResetSeccesfuly());
    }
}
