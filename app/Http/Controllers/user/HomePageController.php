<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joblist;

class HomePageController extends Controller
{
    public function index_user()
    {
        $joblist = Joblist::all();
        return view('user.index_user', compact('joblist'));

    }
}
