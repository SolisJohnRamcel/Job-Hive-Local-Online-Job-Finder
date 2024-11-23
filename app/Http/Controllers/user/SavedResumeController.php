<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SavedResumeController extends Controller
{
    public function saved_resume()
    {
        return view('user.saved_resume');
    }
}
