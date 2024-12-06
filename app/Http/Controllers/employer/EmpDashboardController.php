<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmpDashboardController extends Controller
{
    public function emp_dashboard()
    {

        $employerId = Auth::id();;

        $unsuccessfulApplications = DB::table('job_applications as ja')
            ->join('joblist as jl', 'ja.job_id', '=', 'jl.id')
            ->where('jl.employer_id', $employerId)
            ->where('ja.status', '!=', 'accepted')
            ->count();

        $interviewScheduledCount = DB::table('job_applications as ja')
        ->join('joblist as jl', 'ja.job_id', '=', 'jl.id')
        ->where('jl.employer_id', $employerId)
        ->where('ja.status', 'Interview Scheduled')
        ->count();

        $numOfJobs = DB::table('joblist')
            ->where('employer_id', $employerId)
            ->count();

        $acceptedApplications = DB::table('job_applications')
        ->where('status', 'accepted')
        ->count();

        $successfulHiresByMonth = [];
        for ($month = 1; $month <= 12; $month++) {
        $successfulHiresByMonth[$month] = DB::table('job_applications as ja')
            ->join('joblist as jl', 'ja.job_id', '=', 'jl.id')
            ->where('jl.employer_id', $employerId)
            ->where('ja.status', 'accepted')
            ->whereMonth('ja.created_at', $month)
            ->count();
        }


        $totalApplications = DB::table('job_applications')->count();
        $successRate = $totalApplications > 0 ? ($acceptedApplications / $numOfJobs) * 100 : 0;

        return view('employer.page.emp_dashboard', compact('unsuccessfulApplications', 'interviewScheduledCount', 'numOfJobs', 'successRate', 'successfulHiresByMonth'));
    }
}
