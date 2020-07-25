<?php

namespace App\Http\Controllers\Translator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('TranslatorValidation');
    }
}
