<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joblist;
class AdminJoblistController extends Controller
{
    public function admin_joblist()
    {
        // Fetch all jobs from the Joblist model
        $jobs = Joblist::all();  // Using the correct model here
        
        // Pass the jobs to the view
        return view('admin.page.admin_joblist', compact('jobs'));
    }

}
