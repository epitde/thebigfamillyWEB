<?php

namespace App\Http\Controllers\Translate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('TranslationValidator');
        $this->middleware('VerificationValidation');
    }
}
