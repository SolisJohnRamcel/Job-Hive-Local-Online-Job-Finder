<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joblist;

class HomePageController extends Controller
{
    public function index_user()
    {
        $joblist = Joblist::all();
        return view('user.index_user', compact('joblist'));

    }



    public function search(Request $request)
{
    $query = Joblist::query();


    // Search term
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('company_name', 'like', '%' . $request->search . '%')
              ->orWhere('job_category', 'like', '%' . $request->search . '%');
        });
    }

    // Classification
    if ($request->filled('classification')) {
        $query->where('job_category', $request->classification);
    }

    // Location
    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    // Work Type
    if ($request->filled('work_type')) {
        $query->where('work_type', $request->work_type);
    }

    // Salary Range
    if ($request->filled(['salary_from', 'salary_to', 'salary_type'])) {
        $query->whereBetween($request->salary_type === 'monthly' ? 'salary_min' : 'salary_max', 
            [$request->salary_from, $request->salary_to]);
    }

    // Posted Time
    if ($request->filled('posted_time')) {
        $days = match($request->posted_time) {
            'Last 3 days' => 3,
            'Last 7 days' => 7,
            'Last 14 days' => 14,
            'Last 30 days' => 30,
            default => null
        };
        
        if ($days) {
            $query->where('created_at', '>=', now()->subDays($days));
        }
    }

    $joblist = $query->latest()->paginate(12);
    
    return view('user.index_user', compact('joblist'));
}
}
