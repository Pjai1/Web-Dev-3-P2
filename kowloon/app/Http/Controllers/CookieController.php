<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function toggleCookie() {
        return response('200')->cookie('cookieClicked','clicked');
    }
}
