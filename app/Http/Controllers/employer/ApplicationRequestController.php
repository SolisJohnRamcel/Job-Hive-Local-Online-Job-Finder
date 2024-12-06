<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\Joblist;
use App\Models\Notification;

class ApplicationRequestController extends Controller
{
    public function application_request()
    {
        $employerId = Auth::id();

        // Fetch job applications linked to jobs created by the employer
        $applications = JobApplication::whereHas('job', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })->with('job')->get();

        // Pass the applications to the view
        return view('employer.page.application_request', compact('applications'));
    }



    public function sort(Request $request)
    {
        $employerId = Auth::id();

        // Determine the sorting order based on the request input
        $sortOrder = $request->input('sortedby') === 'date_oldest' ? 'asc' : 'desc';

        // Fetch job applications linked to jobs created by the employer with sorting
        $applications = JobApplication::whereHas('job', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })
        ->with('job') // Eager load related job data
        ->orderBy('created_at', $sortOrder) // Sort by application creation date
        ->get();

        // Pass the sorted applications to the view
        return view('employer.page.application_request', compact('applications'));
    }
    // app/Http/Controllers/employer/ApplicationRequestController.php

    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming status value
        $request->validate([
            'status' => 'required|string|in:waiting to be reviewed,in review,interview scheduled,accepted,rejected',
        ]);

        // Find the job application
        $application = JobApplication::findOrFail($id);

        // Update the status of the application
        $application->status = $request->status;
        $application->save();

        // Create a notification for the jobseeker
        Notification::create([
            'user_id' => $application->user_id, // Assuming JobApplication has `user_id` field for jobseeker
            'message' => "Your application for '{$application->job->title}' is now '{$request->status}'.",
        ]);

        // Return the updated status as a JSON response
        return response()->json([
            'status' => $application->status,
        ]);
    }


    
 



    
}
