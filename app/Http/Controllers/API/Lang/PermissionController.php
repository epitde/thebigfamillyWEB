<?php

namespace App\Http\Controllers\API\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('TranslationValidator');
    }
}
