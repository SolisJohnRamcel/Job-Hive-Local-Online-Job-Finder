<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function company_profile()
    {
        return view('employer.page.company_profile');
    }
}
