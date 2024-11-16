<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployerController extends Controller
{
    public function employer(): View
    {
        return view('employer.employer');
    }
}
