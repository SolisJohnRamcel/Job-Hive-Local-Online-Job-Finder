<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joblist;
class EmpJoblistController extends Controller
{
    public function emp_joblist()
    {
        $joblist = Joblist::orderBy('created_at', 'desc')->get();
        return view('employer.page.emp_joblist', compact('joblist'));
    }



   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|integer',
            'salary_max' => 'nullable|integer',
            'work_type' => 'required|string|max:255',
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

        $validated['employer_id'] = auth()->id();

        Joblist::create($validated);

        return back()->with('success', 'Job created successfully!');
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
            'work_type' => 'required|string|max:255',
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

        return back()->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from the database.
     */
    public function destroy(Joblist $joblist)
    {
        $joblist->delete();
        return back()->with('success', 'Job deleted successfully!');
    }
}
