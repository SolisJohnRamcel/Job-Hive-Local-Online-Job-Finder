<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    public function app(): View
    {
        return view('layouts.app')->with([view('user.index')]);
    }
}
