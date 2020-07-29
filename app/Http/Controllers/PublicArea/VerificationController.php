<?php

namespace App\Http\Controllers\PublicArea;

use App\facade\LanguageFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($short_code)
    {
        $response['language'] = LanguageFacade::getByShortCode($short_code);

        $response['language_json'] = LanguageFacade::getJsonByShortCode($short_code);

        return view('publicArea.pages.verification.index')->with($response);
    }

    public function formView($short_code)
    {
        $response['language'] = LanguageFacade::getByShortCode($short_code);

        $response['language_json'] = LanguageFacade::getJsonByShortCode($short_code);

        return view('publicArea.pages.verification.form')->with($response);
    }
}
