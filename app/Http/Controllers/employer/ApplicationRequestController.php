<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationRequestController extends Controller
{
    public function application_request()
    {
        return view('employer.page.application_request');
    }
}
