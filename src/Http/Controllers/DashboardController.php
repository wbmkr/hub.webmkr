<?php

namespace Webmkr\Hub\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('hub::admin.dashboard');
    }
}