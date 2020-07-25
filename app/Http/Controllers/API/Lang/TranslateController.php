<?php

namespace App\Http\Controllers\API\Lang;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use services\facade\LanguageFacade;

class TranslateController extends PermissionController
{

    /**
     * Show the profile for the given user.
     *
     * @return
     */
    public function index($id)
    {
        $response['language'] = LanguageFacade::get($id);

        if (!($response['language'] && $response['language']->user_id == Auth::user()->id)) {
            return redirect()->back()->with('alert-danger', 'Something went wrong');
        }

        $jsonString = file_get_contents(base_path('resources/Applang/' . $response['language']->short_code . '.json'));
        $response['langData'] = json_decode($jsonString, true);

        $response['langDataEN'] = "";
        if ($response['language']->short_code != "en") {
            $jsonString = file_get_contents(base_path('resources/Applang/en.json'));
            $response['langDataEN'] = json_decode($jsonString, true);
        }

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

        return json_encode([
            ['name' => 'Catalan', 'code' => 'ca'],
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'German', 'code' => 'de']


        ]);
    }

    public function getTranslate(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/Applang/' . $request->id . '.json'));
        return $jsonString;
    }
}
