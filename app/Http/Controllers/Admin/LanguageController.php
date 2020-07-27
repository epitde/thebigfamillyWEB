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
        $language = LanguageFacade::getByShortCode($request->short_code);

        if ($language) {
            return redirect()->back()->with('alert-danger', "Language already  exists");
        }
        if ($request->has('image')) {
            $request['flag'] = ImageFacade::up($request->file('image'))['data'];
        }
        $language = LanguageFacade::makeLanguage($request->all());

        return redirect(route('admin.languages'));
    }

    public function edit($id)
    {
        $response['language'] = LanguageFacade::get($id);
        $response['users'] = UserFacade::getUsersByType(User::USER_ROLES['TRANSLATOR']);

        return view('admin.pages.languages.edit')->with($response);
    }

    public function update(Request $request)
    {
        if ($request->has('image')) {
            $request['flag'] = ImageFacade::up($request->file('image'))['data'];
        }
        $language = LanguageFacade::updateLanguage($request->all());

        return redirect(route('admin.languages'));
    }

    public function delete($id)
    {
        LanguageFacade::deleteLanguage($id);

        return redirect()->back()->with('alert-success', "Language deleted successfully");
    }

    public function changeStatus($id)
    {
        LanguageFacade::changeStatus($id);

        return redirect()->back()->with('alert-success', "Status changed successfully");
    }
}
