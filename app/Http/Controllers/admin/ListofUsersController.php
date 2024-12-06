<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ListofUsersController extends Controller
{
    public function list_of_users()
    {
        
        $users = User::all();

        
        return view('admin.page.list_of_users', compact('users'));
    }

}
