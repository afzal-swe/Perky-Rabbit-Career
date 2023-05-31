<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;


class LanguageController extends Controller
{
    //__language change method__//
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) { //bn hn en
            Session::put('applocale', $lang);
        }
    }
}
