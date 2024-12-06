<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerProfilePageController extends Controller
{
    public function employer_profile_page(Request $request)
    {
    return view('employer.employer_profile_page', [
        'user' => $request->user(),
    ]);
    }
}
