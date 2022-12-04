<?php

namespace App\Providers;

use App\Providers\JobCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  \App\Providers\JobCompleted  $event
     * @return void
     */
    public function handle(JobCompleted $event)
    {
        //
    }
}
