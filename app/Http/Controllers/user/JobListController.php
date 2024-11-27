<?php

namespace App\Http\Controllers\user;

use App\Models\Joblist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    /**
     * Display a listing of the joblist.
     */
    public function index()
    {
        $joblist = Joblist::all(); // Retrieve all joblist entries
        return view('joblist.index', compact('joblist')); // Pass joblist to the view
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('joblist.create'); // Show job creation form
    }

    /**
     * Store a newly created job in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|integer',
            'salary_max' => 'nullable|integer',
            'job_category' => 'required|string|max:255',
            'job_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_info' => 'nullable|string',
        ]);

        // Handle file uploads
        if ($request->hasFile('job_img')) {
            $validated['job_img'] = $request->file('job_img')->store('joblist/img', 'public');
        }
        if ($request->hasFile('job_cover_photo')) {
            $validated['job_cover_photo'] = $request->file('job_cover_photo')->store('joblist/cover', 'public');
        }

        Joblist::create($validated);

        return redirect()->route('joblist.index')->with('success', 'Job created successfully!');
    }

    /**
     * Display the specified job.
     */
    public function show(Joblist $joblist)
    {
        return view('joblist.show', compact('joblist')); // Show a specific job
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Joblist $joblist)
    {
        return view('joblist.edit', compact('joblist')); // Show job edit form
    }

    /**
     * Update the specified job in the database.
     */
    public function update(Request $request, Joblist $joblist)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|integer',
            'salary_max' => 'nullable|integer',
            'job_category' => 'required|string|max:255',
            'job_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_info' => 'nullable|string',
        ]);

        // Handle file uploads
        if ($request->hasFile('job_img')) {
            $validated['job_img'] = $request->file('job_img')->store('joblist/img', 'public');
        }
        if ($request->hasFile('job_cover_photo')) {
            $validated['job_cover_photo'] = $request->file('job_cover_photo')->store('joblist/cover', 'public');
        }

        $joblist->update($validated);

        return redirect()->route('joblist.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from the database.
     */
    public function destroy(Joblist $joblist)
    {
        $joblist->delete();
        return redirect()->route('joblist.index')->with('success', 'Job deleted successfully!');
    }
} 

