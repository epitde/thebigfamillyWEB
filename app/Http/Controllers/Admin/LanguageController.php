<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use services\facade\ImageFacade;
use services\facade\LanguageFacade;
use services\facade\UserFacade;

class LanguageController extends PermissionController
{
    public function index()
    {
        $response['languages'] = LanguageFacade::getAllLanguages();

        return view('admin.pages.languages.all')->with($response);
    }

    public function add()
    {
        $response['users'] = UserFacade::getUsersByType(User::USER_ROLES['TRANSLATOR']);

        return view('admin.pages.languages.add')->with($response);
    }

    public function store(Request $request)
    {
        if ($request->has('image')) {
            $request['flag'] = ImageFacade::up($request->file('image'))['data'];

            $language = LanguageFacade::create($request->all());
            LanguageFacade::createJsonFile($language);
        }
        return redirect(route('admin.languages'));
    }
}
