<?php

namespace Webmkr\Hub\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('hub::admin.auth.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate(Admin::$loginRules);

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            session()->flash('success', 'Login efetuado com sucesso.');
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Usuário ou senha incorreta.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard');
    }
}