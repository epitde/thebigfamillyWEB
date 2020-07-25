<?php

namespace App\Listeners;

use App\Events\AssignTranslatorEvent;
use App\Mail\AssignTranslatorMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use services\facade\UserFacade;

class AssignTranslatorListener
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
     * @param  AssignTranslatorEvent  $event
     * @return void
     */
    public function handle(AssignTranslatorEvent $event)
    {
        $language = $event->language;
        $data = $event->data;

        $user = UserFacade::get($data['user_id']);

        $arr['language'] = $language;
        $arr['user'] = $user;

        Mail::to($user['email'])->send(new AssignTranslatorMail($arr));
    }
}
