<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('translator.pages.dashboard.dashboard');
    }
}
