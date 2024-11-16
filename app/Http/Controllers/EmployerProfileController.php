<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
class EmployerProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('employer.profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
