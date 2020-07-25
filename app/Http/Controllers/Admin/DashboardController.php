<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use services\facade\UserFacade;

class DashboardController extends PermissionController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response['users'] = UserFacade::getAllUsers();

        return view('admin.pages.dashboard.dashboard')->with($response);
    }
}
