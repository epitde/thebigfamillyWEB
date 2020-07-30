<?php

namespace App\Http\Controllers\PublicArea;

use App\facade\GeneralProfileFacade;
use App\facade\LanguageFacade;
use App\facade\OrganizationalProfileFacade;
use App\facade\UserFacade;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\DatesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use DatesTrait;

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

        $response['profile'] = Auth::user()->generalProfile ? Auth::user()->generalProfile : Auth::user()->organizationProfile;
        $response['dates'] = $this;

        return view('publicArea.pages.verification.form')->with($response);
    }

    public function submitForm(Request $request, $short_code)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        $user = UserFacade::updateProfileType($data);

        if ($user->profile_type == User::PROFILE_TYPE['GENERAL']) {
            GeneralProfileFacade::create($data);
        } else if ($user->profile_type == User::PROFILE_TYPE['ORGANIZATIONAL']) {
            OrganizationalProfileFacade::create($data);
        }

        return redirect(route('verification.form.preview', $short_code));
    }

    public function previewForm($short_code)
    {
        $response['language'] = LanguageFacade::getByShortCode($short_code);

        $response['language_json'] = LanguageFacade::getJsonByShortCode($short_code);

        $response['profile'] = Auth::user()->generalProfile ? Auth::user()->generalProfile : Auth::user()->organizationProfile;

        return view('publicArea.pages.verification.preview-form')->with($response);
    }
}
