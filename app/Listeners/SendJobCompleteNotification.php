<?php

namespace App\Listeners;

use App\Events\JobCompleted;
use App\Mail\TaskCompleted;
use Illuminate\Console\View\Components\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendJobCompleteNotification
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
     * @param  \App\Events\JobCompleted  $event
     * @return void
     */
    public function handle(JobCompleted $event)
    {
        $data = ['Message' => 'Thanks For Testing'];
        Mail::send('emails.task_completed', compact('data'), function($message) {
            $message->to(env('RECIEVER_EMAIL'))->subject('Task Completed');
        });
    }
}
