<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SigninController extends Controller
{
    public function create(): View
    {
        return view('auth.signin');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email field is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password field is required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            
            // Get the authenticated user
            $user = Auth::user();
            
            // Check user type and redirect accordingly
            if ($user->usertype === 'admin') {
                return redirect()->route('admin')->with('success', 'Welcome back admin!');
            } elseif ($user->usertype === 'employer') {
                return redirect()->route('employer')->with('success', 'Welcome back employer!');
            } else {
                return redirect()->route('app')->with('success', 'Welcome back!');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }
}
