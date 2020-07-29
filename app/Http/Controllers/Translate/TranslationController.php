<?php

namespace App\Http\Controllers\Translate;

use App\facade\LanguageFacade;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranslationController extends PermissionController
{
    /**
     * Show the profile for the given user.
     *
     * @return
     */
    public function index($short_code)
    {
        $response['language'] = LanguageFacade::getByShortCode($short_code);

        if (Auth::user()->user_role != User::USER_ROLES['ADMIN'] && !($response['language'] && $response['language']->user_id == Auth::user()->id)) {
            return redirect()->back()->with('alert-danger', 'Something went wrong');
        }

        $response['langData'] = LanguageFacade::getJsonByShortCode($short_code);

        $response['langDataEN'] = LanguageFacade::getJsonByShortCode('en');

        $response['total_completed_percentage'] = LanguageFacade::getCompletedPercentage($response['langData']);

        if (Auth::user()->user_role == User::USER_ROLES['ADMIN']) {
            return view('admin.pages.translate.translate')->with($response);
        } else {
            return view('translator.pages.translate.translate')->with($response);
        }
    }

    /**
     * Change Data in lanuuage.json.
     *
     * @return
     */
    public function editJsonFile(Request $request)
    {
        $language = LanguageFacade::get($request->id);

        $jsonString = file_get_contents(base_path('resources/Applang/' . $language->short_code . '.json'));
        $data = json_decode($jsonString, true);

        $data[$request->array_key][$request->key] = $request->value;

        $newJsonString = json_encode($data);

        file_put_contents(base_path('resources/Applang/' . $language->short_code . '.json'), $newJsonString);
    }
}
