<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;

class ApplicationController extends Controller
{
    public function application()
    {
        // Fetch the authenticated user's ID
        $userId = Auth::id();

        // Query job applications belonging to the authenticated user
        // Include the related job information (like job title) using 'with'
        $jobApplications = JobApplication::where('user_id', $userId)
            ->with('job') // Assuming 'job' is the relationship in JobApplication model
            ->get();

        // Pass the applications to the view
        return view('user.application', compact('jobApplications'));
    }
}
