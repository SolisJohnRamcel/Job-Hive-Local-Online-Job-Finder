<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class view extends Controller
{
    public function signin()
    {
        return view("auth.signin");
    }

    public function signup()
    {
        return view("auth.signup");
    }

    public function resetpass()
    {
        return view("auth.resetpass");
    }

    public function user()
    {
        return view("user");
    }

    public function dashboard()
    {
        return view("dashboard");
    }
}
