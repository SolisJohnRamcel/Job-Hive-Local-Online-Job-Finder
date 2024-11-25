<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListofUsersController extends Controller
{
    public function list_of_users()
    {
        return view('admin.page.list_of_users');
    }
}
