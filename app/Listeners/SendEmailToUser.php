<?php

namespace Mejenguitas\Listeners;

use Mejenguitas\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailToUser
{
    
    public function handle(MessageWasReceived $event)
    {
        $msg = $event->message;
        Mail::send('emails.message', ['msg' => $msg], function($m) use ($msg){
            $m->from(auth()->user()->email, auth()->user()->name)
            ->to($msg->email_receive)
            ->subject($msg->subject);
        });
    }
}
