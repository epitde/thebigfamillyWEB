<?php

namespace services\Mails;

use App\Events\AssignTranslatorEvent;
use App\Events\NotifyAdminOnRejectEvent;
use App\Models\Language;
use App\Models\User;
use services\facade\LanguageFacade;
use services\facade\UserFacade;

class MailService
{
    public function sendRequestToTranslator(Language $language, $data)
    {
        event(new AssignTranslatorEvent($language, $data));
    }

    public function sendNotificationOnReject($user_id, $language_id)
    {
        $translator = UserFacade::get($user_id);
        $language = LanguageFacade::get($language_id);

        $admins = UserFacade::getUsersByType(User::USER_ROLES['ADMIN']);

        foreach ($admins as $admin) {
            $arr['user'] = $admin;
            $arr['translator'] = $translator;
            $arr['language'] = $language;

            event(new NotifyAdminOnRejectEvent($arr));
        }
    }
}
