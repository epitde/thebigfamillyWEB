<?php

namespace App\Listeners;

use App\Events\NotifyAdminOnRejectEvent;
use App\Mail\NotifyAdminOnRejectMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAdminOnRejectListener
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
     * @param  NotifyAdminOnRejectEvent  $event
     * @return void
     */
    public function handle(NotifyAdminOnRejectEvent $event)
    {
        $data = $event->data;

        $user = $data['user'];

        $arr['language'] = $data['language'];
        $arr['user'] = $user;
        $arr['translator'] = $data['translator'];

        Mail::to($user['email'])->send(new NotifyAdminOnRejectMail($arr));
    }
}
