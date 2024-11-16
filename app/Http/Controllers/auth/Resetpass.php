<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Resetpass extends Controller
{
    public function resetpass(): View
    {
        return view('auth.resetpass');
    } 
}
