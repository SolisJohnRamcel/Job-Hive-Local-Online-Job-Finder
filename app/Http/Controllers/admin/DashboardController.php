<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $activeUsers = DB::table('users')->count();

        $activeJobs = DB::table('joblist')->count();
        
        $jobseeker = DB::table('users')->where('usertype', NULL)->count();
        $employers = DB::table('users')->where('usertype', 'EMPLOYER')->count();
        
        $jobApplicationsByMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            // Get the count of job applications for the current month
            $jobApplicationsByMonth[$month] = DB::table('job_applications')
                ->whereMonth('created_at', $month)  // Filter by the current month
                ->count();  // Count the number of job applications
        }

        $successfulHiresByMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $successfulHiresByMonth[$month] = DB::table('job_applications')
                ->whereMonth('created_at', $month)
                ->where('status', 'accepted')
                ->count();
        }

        $tradesAndSkillLaborJobs = DB::table('joblist')
        ->where('job_category', 'Trades and Skill Labor')
        ->count();

        $EntrepreneurJobs = DB::table('joblist')
        ->where('job_category', 'Entrepreneur')
        ->count();

        $Business = DB::table('joblist')
        ->where('job_category', 'Business')
        ->count();

        $Law_and_Public_Service = DB::table('joblist')
        ->where('job_category', 'Law and Public Service')
        ->count();

        $Engineering = DB::table('joblist')
        ->where('job_category', 'Engineering')
        ->count();

        $Finance = DB::table('joblist')
        ->where('job_category', 'Finance')
        ->count();

        $Education = DB::table('joblist')
        ->where('job_category', 'Education')
        ->count();

        
        $Healthcare = DB::table('joblist')
        ->where('job_category', 'Healthcare')
        ->count();

        $IT = DB::table('joblist')
        ->where('job_category', 'IT')
        ->count();

        $totalHires = DB::table('job_applications')->where('status', 'accepted')->count();
        $totalApplications = DB::table('job_applications')->count();
        $successRate = $totalApplications > 0 ? ($totalHires / $totalApplications) * 100 : 0;

        return view('admin.page.dashboard', compact(
            'activeUsers', 
            'activeJobs',
            'employers',
            'successRate',
            'jobseeker',
            'jobApplicationsByMonth',
            'successfulHiresByMonth',
            'tradesAndSkillLaborJobs',
            'EntrepreneurJobs',
            'Business',
            'Law_and_Public_Service',
            'Engineering',
            'Finance',
            'Education',
            'Healthcare',
            'IT'

        
        
        
        
        
        
        ));
    }
}
