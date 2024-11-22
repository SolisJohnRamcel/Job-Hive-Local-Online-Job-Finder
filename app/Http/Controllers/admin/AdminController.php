<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function admin(): View
    {
        return view('admin.admin')->with([view('admin.page.dashboard')]);
    }
}
