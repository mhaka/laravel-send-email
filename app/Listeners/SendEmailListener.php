<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param  \App\Events\SendEmailEvent  $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {
        $data = $event->data;
        $email = $data['email'];
        $text = $data['text'];
        $datetime = $data['datetime'];

        // mail
        Mail::to($email)->send(new SendEmail($text, $datetime));
    }
}
