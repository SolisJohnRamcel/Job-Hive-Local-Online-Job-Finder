<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpDashboardController extends Controller
{
    public function emp_dashboard()
    {
        return view('employer.page.emp_dashboard');
    }
}
