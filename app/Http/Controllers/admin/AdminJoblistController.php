<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminJoblistController extends Controller
{
    public function admin_joblist()
    {
        return view('admin.page.admin_joblist');
    }
}
