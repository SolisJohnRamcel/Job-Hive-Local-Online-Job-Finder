<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilePageController extends Controller
{
    public function profile_page(Request $request)
    {
    return view('user.profile_page', [
        'user' => $request->user(),
    ]);
    }
}
