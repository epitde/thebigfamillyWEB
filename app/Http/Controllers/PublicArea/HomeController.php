<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use App\facade\LanguageFacade;
use App\facade\MailFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('publicArea.pages.landing.index');
    }

    public function rejectRequest($user_id, $language_id)
    {
        $decoded_user_id = base64_decode($user_id);
        $decoded_language_id = base64_decode($language_id);

        $data['user_id'] = null;
        $data['id'] = $decoded_language_id;

        LanguageFacade::updateLanguage($data);

        MailFacade::sendNotificationOnReject($decoded_user_id, $decoded_language_id);

        return redirect(route('login'));
    }
}
