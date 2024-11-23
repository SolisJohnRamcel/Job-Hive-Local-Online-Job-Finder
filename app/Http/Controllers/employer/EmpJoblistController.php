<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpJoblistController extends Controller
{
    public function emp_joblist()
    {
        return view('employer.page.emp_joblist');
    }
}
