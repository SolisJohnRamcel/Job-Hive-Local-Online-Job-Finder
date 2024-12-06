@extends('employer.employer')

@push('styles')
    
    
@endpush
@section('content')
<div class="row bg-light shadow-sm py-3 mb-5">
        <div class="col d-flex justify-content-between align-items-center position-relative">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Dashboard</h2>
            <div class="position-absolute end-0 me-3">
                <a class="btn fw-bold shadow-sm" href="{{route('company_profile')}}" style="background-color: #ececec;"><i class="bi bi-buildings me-2"></i>Company Profile</a>
            </div>
        </div>
    </div>

    <div class="container">
   
        <div class="row mb-3">
        <div class="col-md-3">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title text-center">Pending Applications</h5>
                <p class="card-text text-center" id="pendingApplications">{{$unsuccessfulApplications}}</p>
                <!--SELECT COUNT(ja.id) AS successful_applications
                FROM job_applications ja
                JOIN joblist jl ON ja.job_id = jl.id
                WHERE jl.employer_id = 4
                AND ja.status != 'success';-->
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title text-center">Scheduled for Interview</h5>
                <p class="card-text text-center" id="scheduledInterview">{{$interviewScheduledCount}}</p>
            </div>
            <!--SELECT COUNT(ja.id) AS successful_applications
                FROM job_applications ja
                JOIN joblist jl ON ja.job_id = jl.id
                WHERE jl.employer_id = 4
                AND ja.status = 'Interview Scheduled';-->
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title text-center">Number of Jobs</h5>
                <p class="card-text text-center" id="numOfJobs">{{$numOfJobs}}</p>
            </div>
            <!--SELECT count(id) FROM `joblist` WHERE employer_id = '4';-->
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title text-center">Success Hiring Rate</h5>
                <p class="card-text text-center" id="successHiringRate">{{$successRate}}%</p> 
            </div>
            </div>
        </div>
        </div>

    
        <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Applications Per Month</h5>
                <div class="chart-container">
                <canvas id="applicationsPerJobChart"></canvas>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var applicationmonth1 = '{{$successfulHiresByMonth[1]}}';
        var applicationmonth2 = '{{$successfulHiresByMonth [2]}}';
        var applicationmonth3 = '{{$successfulHiresByMonth [3]}}';
        var applicationmonth4 = '{{$successfulHiresByMonth [4]}}';
        var applicationmonth5 = '{{$successfulHiresByMonth [5]}}';
        var applicationmonth6 = '{{$successfulHiresByMonth [6]}}';
        var applicationmonth7 = '{{$successfulHiresByMonth [7]}}';
        var applicationmonth8 = '{{$successfulHiresByMonth [8]}}';
        var applicationmonth9 = '{{$successfulHiresByMonth [9]}}';
        var applicationmonth10 = '{{$successfulHiresByMonth [10]}}';
        var applicationmonth11 = '{{$successfulHiresByMonth [11]}}';
        var applicationmonth12 = '{{$successfulHiresByMonth [12]}}';
        /*
        SELECT COUNT(ja.id) AS successful_applications
        FROM job_applications ja
        JOIN joblist jl ON ja.job_id = jl.id
        WHERE jl.employer_id = 4
        AND ja.status = 'Success'
        AND MONTH(ja.created_at) = 12;
        */
        const applicationsPerJobData = [applicationmonth1, applicationmonth2, applicationmonth3, applicationmonth4, applicationmonth5, applicationmonth6, applicationmonth7, applicationmonth8, applicationmonth9, applicationmonth10, applicationmonth11, applicationmonth12]; 
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; 

        
        new Chart(document.getElementById('applicationsPerJobChart'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
            label: 'Applications Per Job',
            data: applicationsPerJobData,
            borderColor: 'rgba(75, 192, 192, 1)', 
            fill: false, 
            borderWidth: 2 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
            y: {
                beginAtZero: true, 
                title: {
                display: true,
                text: 'Number of Applications'
                }
            },
            x: {
                title: {
                display: true,
                text: 'Months'
                }
            }
            }
        }
        });
    });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

@endsection