<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\facade\UserFacade;
use Illuminate\Http\Request;

class UserController extends PermissionController
{
    public function index()
    {
        $response['users'] = UserFacade::getAllUsers();

        return view('admin.pages.users.all')->with($response);
    }

    public function add()
    {
        return view('admin.pages.users.add');
    }

    public function store(Request $request)
    {
        $user = UserFacade::getUserByEmail($request->email);

        if ($user) {
            return redirect()->back()->with('alert-danger', "User with this email exists");
        }

        $user = UserFacade::createUser($request->all());

        return redirect(route('admin.users'));
    }

    public function edit($id)
    {
        $response['user'] = UserFacade::get($id);

        return view('admin.pages.users.edit')->with($response);
    }

    public function update(Request $request)
    {
        $user = UserFacade::updateUser($request->all());

        return redirect(route('admin.users'));
    }

    public function delete($id)
    {
        UserFacade::delete($id);

        return redirect()->back()->with('alert-success', "User deleted successfully");
    }
}
