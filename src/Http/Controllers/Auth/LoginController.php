<?php

namespace Webmkr\Hub\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('hub::admin.auth.login');
    }
}