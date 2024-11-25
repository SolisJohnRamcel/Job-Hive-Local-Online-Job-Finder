<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReportsController extends Controller
{
    public function admin_reports()
    {
        return view('admin.page.admin_reports');
    }
}
