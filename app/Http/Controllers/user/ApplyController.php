<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joblist;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function apply($job_id)
    {
        $job = Joblist::findOrFail($job_id); // Fetch the job details
        return view('user.apply', compact('job'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'You must be logged in to apply for a job.');
        }
        // Validate the incoming data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'applied_position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'interview_date' => 'required|date',
            'time_slot' => 'required|string|max:255',
            'resume' => 'nullable|mimes:pdf,doc,docx,odt,txt|max:2048',
        ]);

        // Create the job application
        $jobApplication = new JobApplication([
            'job_id' => $request->job_id,
            'user_id' =>  $userId, // Ensure job_id is passed in the form or added in the request
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'applied_position' => $request->applied_position,
            'start_date' => $request->start_date,
            'interview_date' => $request->interview_date,
            'time_slot' => $request->time_slot,
            'status' => $request->status
       
        ]);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filePath = $file->store('resumes', 'public'); // Store in 'resumes' folder in public disk
            $jobApplication->resume = $filePath;
             // Save the file path to the database
        }

        // Save the job application data to the database
        $jobApplication->save();

       

        return back()->with('success', 'Application submitted successfully');
    }
    public function destroy($application_id)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Find the job application by its ID
        $jobApplication = JobApplication::where('id', $application_id)
                                         ->where('user_id', $userId) // Ensure the application belongs to the authenticated user
                                         ->first();

        // Check if the application exists
        if (!$jobApplication) {
            return back()->with('error', 'Job application not found or you do not have permission to delete it.');
        }

        // Delete the job application
        $jobApplication->delete();

        return back()->with('success', 'Job application deleted successfully.');
    }
}
