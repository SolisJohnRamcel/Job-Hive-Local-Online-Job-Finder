<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SignupController extends Controller
{   
    public function create(): View
    {
        return view('auth.signup');
    }
    public function employeracc(): View
    {
        return view('auth.signup_employer');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password field is required',
            'password.min' => 'Password must be at least 6 characters',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Passwords do not match'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        return redirect()->route('signin')->with('success', 'Registration successful!');
    }
    public function storeemployer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password field is required',
            'password.min' => 'Password must be at least 6 characters',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Passwords do not match'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'usertype' => 'employer' // Explicitly setting usertype to employer
        ]);

        return redirect()->route('signin')->with('success', 'Registration successful!');
    }
}
