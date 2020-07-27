<?php

namespace App\Http\Controllers\API\Lang;

use App\Models\User;
use App\facade\LanguageFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Routing\Controller as BaseController;

class TranslateController extends BaseController
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

        $jsonString = file_get_contents(base_path('resources/Applang/' . $response['language']->short_code . '.json'));
        $response['langData'] = json_decode($jsonString, true);

        $jsonString = file_get_contents(base_path('resources/Applang/en.json'));
        $response['langDataEN'] = json_decode($jsonString, true);

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

    public function getLangAvailable(Request $request)
    {


        $languages = DB::table('languages')->Where([['status', 1]])->get();

        $langArray =  [];
        foreach ($languages as $lang) {
            $langArray[] = ['name' => $lang->name, 'code' => $lang->short_code, 'flag' => $lang->flag];
        }
        return json_encode($langArray);
    }

    public function getTranslate(Request $request)
    {

        $jsonString = file_get_contents(base_path('resources/Applang/' . $request->id . '.json'));

        if ($request->id != "en") {
            $jsonStringEn = file_get_contents(base_path('resources/Applang/en.json'));
            $langSetEn = json_decode($jsonStringEn, true);
            $langSet = json_decode($jsonString, true);
            foreach ($langSet as $key => $langSection) {
                foreach ($langSection as $lngkey => $lang) {
                    if (strlen($lang) == 0) {
                        $langSet[$key][$lngkey] = $langSetEn[$key][$lngkey];
                    }
                }
            }
            $jsonString = json_encode($langSet);
        }

        return $jsonString;
    }
}
