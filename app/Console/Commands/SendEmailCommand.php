<?php

namespace App\Console\Commands;

use App\Models\Notification;
use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {email} {text} {datetime}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email with given parameters';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $email = $this->argument('email');
        $text = $this->argument('text');
        $datetime = $this->argument('datetime');

        $validatedData = [
            'email' => $email,
            'text' => $text,
            'datetime' => $datetime,
        ];
        // event
        event(new \App\Events\SendEmailEvent($validatedData));

        // Store the event as a notification in the database
        Notification::create([
            'event' => 'SendEmailEvent',
            'data' => json_encode($validatedData),
        ]);

        $this->info('Email sent successfully!');
    }
}
