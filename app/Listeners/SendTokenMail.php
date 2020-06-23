<?php

namespace App\Listeners;

use App\Events\TokenCreated;
use App\Mail\TokenMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendTokenMail
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
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle( TokenCreated $event)
    {
        Mail::to($event->token->email)->send(new TokenMail($event->token));
    }
}
