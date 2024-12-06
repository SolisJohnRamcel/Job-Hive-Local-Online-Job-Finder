<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function company_profile()
    {
        $user = Auth::user();
        $companyProfile = $user->companyProfile ;
    
        return view('employer.page.company_profile', compact('companyProfile'));
    }

    public function storeCompanyProfile(Request $request)
    {
    $user = Auth::user();

    // Validate incoming request
    $validated = $request->validate([
        'company_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'description' => 'nullable|string',
        'location' => 'nullable|string|max:255',
        'website' => 'nullable|url|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate logo
        'contact_person' => 'nullable|string|max:255',
        'contact_phone' => 'nullable|string|max:20',
        'contact_email' => 'nullable|email|max:255',
    ]);

    // Handle logo upload if present
    if ($request->hasFile('logo')) {
        // Delete old logo if it exists
        if ($user->companyProfile && $user->companyProfile->logo) {
            Storage::delete($user->companyProfile->logo);
        }

        // Store the new logo
        $validated['logo'] = $request->file('logo')->store('logos', 'public');
    }

    // Update or create the company profile
    $user->companyProfile()->updateOrCreate(
        ['user_id' => $user->id],
        $validated
    );

    return redirect()->back()->with('success', 'Company Profile updated successfully.');
    }
}
