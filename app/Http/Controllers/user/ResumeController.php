<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;


class ResumeController extends Controller
{
    public function resume()
    {
        return view('user.resume');
    }
    public function generate(Request $request)
    {
        // Collect and validate form data
        $data = $request->validate([
            'resumefirstname' => 'required',
            'resumelastname' => 'required',
            'email' => 'required|email',
            'contactdetails' => 'required',
            'address' => 'required',
            'formAboutme' => 'nullable',
            'employment' => 'nullable|array',
            'education' => 'nullable|array',
            'skills' => 'nullable|array',
            'resumeprofileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Handle image upload
        ]);

        // Initialize empty arrays if they don't exist
        $data['employment'] = $data['employment'] ?? [];
        $data['education'] = $data['education'] ?? [];
        $data['skills'] = $data['skills'] ?? [];

        // Handle profile image upload
        if ($request->hasFile('resumeprofileimage')) {
            $imagePath = $request->file('resumeprofileimage')->store('profile_images', 'public');
            $data['profileImage'] = public_path('storage/' . $imagePath); // Absolute path
        } else {
            $data['profileImage'] = null; // No image uploaded
        }

        // Generate PDF
        $pdf = PDF::loadView('resume.template', ['data' => $data]);
        
        return $pdf->download('resume.pdf');
    }

}
