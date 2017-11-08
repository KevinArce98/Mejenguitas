<?php

namespace Mejenguitas\Listeners;

use Mejenguitas\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendAutoresponder
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
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $msg = $event->message;
        Mail::send('emails.message', ['msg' => $msg], function($m) use ($msg){
            $m->to(auth()->user()->email, auth()->user()->name)->subject('Tu Mensaje fue enviado');
        });
    }
}
