@extends('admin.admin')

@push('styles')
    
    
@endpush
@section('content')
<div class="container mt-3">
  <div class="row bg-light shadow-sm py-3 mb-3">
      <div class="col d-flex justify-content-center align-items-center position-relative mb-3">
          <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Dashboard</h2>
      </div>
  </div>
</div>
<div class="container">
    <div class="row mb-3">
      <!-- Statistics -->
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Active Users</h5>
            <p class="card-text" id="activeUsers">{{ $activeUsers }}</p>
            <!--SELECT COUNT(id) 
            FROM `users` -->
          
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Active Jobs</h5>
            <p class="card-text" id="activeJobs">{{ $activeJobs }}</p>
            <!--SELECT count(id) FROM `joblist` -->
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Employers</h5>
            <p class="card-text" id="employers">{{ $employers }}</p>
            <!--SELECT COUNT(id) 
            FROM `users` 
            WHERE usertype = 'EMPLOYER';-->
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Success Hiring Rate</h5>
            
            <p class="card-text" id="successRate">{{ number_format($successRate, 2) }}%</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts -->
    <div class="row mb-3">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Success Jobs Per Month</h5>
            <div class="chart-container">
              <canvas id="successJobsChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Active Jobs by Category</h5>
            <div class="chart-container">
              <canvas id="activeJobsChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Job Posts Per Month</h5>
            <div class="chart-container">
              <canvas id="jobPostsChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Job Posts by Region</h5>
            <div class="chart-container">
              <canvas id="regionsChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    //#variblesforactivejobscategory
    var mixmix1 = '{{$IT}}';
    var mixmix2 = '{{$Healthcare}}';
    var mixmix3 = '{{$Education}}';
    var mixmix4 = '{{$Finance}}';
    var mixmix5 = '{{$Engineering}}';
    var mixmix6 = '{{$Law_and_Public_Service}}';
    var mixmix7 = '{{$tradesAndSkillLaborJobs}}';
    var mixmix8 = '{{$Business}}';
    var mixmix9 = '{{$EntrepreneurJobs}}';
    /*SELECT count(id) FROM `joblist` WHERE job_category = "Trades and Skill Labor";*/

    //#variablesforregion
    var jobseeker = '{{ $jobseeker }}';
    /*SELECT 
    (SELECT COUNT(id) FROM `users`) - 1 -
    (SELECT COUNT(id) FROM `users` WHERE usertype = 'EMPLOYER') AS difference;*/
    var employer = '{{ $employers }}'; 
    /*SELECT COUNT(id) 
    FROM `users` 
    WHERE usertype = 'EMPLOYER';*/
   


    //#variblesforjoblisting
    var month1 = {{ $jobApplicationsByMonth[1] ?? 0 }};  // January
    var month2 = {{ $jobApplicationsByMonth[2] ?? 0 }};  // February
    var month3 = {{ $jobApplicationsByMonth[3] ?? 0 }};  // March
    var month4 = {{ $jobApplicationsByMonth[4] ?? 0 }};  // April
    var month5 = {{ $jobApplicationsByMonth[5] ?? 0 }};  // May
    var month6 = {{ $jobApplicationsByMonth[6] ?? 0 }};  // June
    var month7 = {{ $jobApplicationsByMonth[7] ?? 0 }};  // July
    var month8 = {{ $jobApplicationsByMonth[8] ?? 0 }};  // August
    var month9 = {{ $jobApplicationsByMonth[9] ?? 0 }};  // September
    var month10 = {{ $jobApplicationsByMonth[10] ?? 0 }}; // October
    var month11 = {{ $jobApplicationsByMonth[11] ?? 0 }}; // November
    var month12 = {{ $jobApplicationsByMonth[12] ?? 0 }}; // December
    /*SELECT count(id) 
    FROM job_applications
    WHERE MONTH(STR_TO_DATE(created_at, '%Y-%m-%d')) = 12;*/

    //#variblesforsuccessjobhiring
    var hiredmonth1 = {{$successfulHiresByMonth[0] ?? 0}};
    var hiredmonth2 = {{$successfulHiresByMonth[2] ?? 0}};
    var hiredmonth3 = {{$successfulHiresByMonth[3] ?? 0}};
    var hiredmonth4 = {{$successfulHiresByMonth[4] ?? 0}};
    var hiredmonth5 = {{$successfulHiresByMonth[5] ?? 0}};
    var hiredmonth6 = {{$successfulHiresByMonth[6] ?? 0}};
    var hiredmonth7 = {{$successfulHiresByMonth[7] ?? 0}};
    var hiredmonth8 = {{$successfulHiresByMonth[8] ?? 0}};
    var hiredmonth9 = {{$successfulHiresByMonth[9] ?? 0}};
    var hiredmonth10 = {{$successfulHiresByMonth[10] ?? 0}};
    var hiredmonth11 = {{$successfulHiresByMonth[11] ?? 0}};
    var hiredmonth12 = {{$successfulHiresByMonth[12] ?? 0}};
    /*SELECT count(id) 
    FROM job_applications
    WHERE MONTH(STR_TO_DATE(created_at, '%Y-%m-%d')) = 12; and status = 'SUCCESS'*/
   


    
    // Variables for data
    const successJobsData = [hiredmonth1, hiredmonth2, hiredmonth3, hiredmonth4, hiredmonth5, hiredmonth6, hiredmonth7, hiredmonth8, hiredmonth9, hiredmonth10, hiredmonth11, hiredmonth12]; // Data for success jobs per month
    const activeJobsCategoryData = [mixmix1, mixmix2, mixmix3, mixmix4, mixmix5, mixmix6, mixmix7, mixmix8, mixmix9]; // Data for active jobs by category
    const jobPostsData = [month1, month2, month3, month4, month5, month6, month7, month8, month9, month10, month11, month12]; // Data for job posts per month
    const regionJobData = [employer, jobseeker]; // Data for job posts by region
  
    // Chart for Success Jobs Per Month
    new Chart(document.getElementById('successJobsChart'), {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Success Jobs',
          data: successJobsData, // Using the variable
          backgroundColor: '#FFCA28',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
   
    // Chart for Active Jobs by Category
    new Chart(document.getElementById('activeJobsChart'), {
      type: 'pie',
      data: {
        labels: ['IT', 'Healthcare', 'Education', 'Finance', 'Engineering', 'Law and Public Service', 'Trades and skill labor', 'Business', 'Entrepreneur'],
        datasets: [{
          data: activeJobsCategoryData, // Using the variable
          backgroundColor: [
        '#FFEB3B',  // Light Yellow
        '#FFEB8C',  // Pale Yellow
        '#FFCA28',  // Amber Yellow
        '#FFC107',  // Yellow
        '#FFB300',  // Dark Yellow
        '#FF9800',  // Orange Yellow
        '#F57C00',  // Deep Orange Yellow
        '#FF6F00',  // Strong Yellow-Orange
        '#FF3D00'   // Bright Orange Yellow
      ]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });

    // Chart for Job Posts Per Month
    new Chart(document.getElementById('jobPostsChart'), {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Job Posts',
          data: jobPostsData, // Using the variable
          backgroundColor: '#FFEB8C',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    // Chart for Job Posts by Region
    new Chart(document.getElementById('regionsChart'), {
      type: 'pie',
      data: {
        labels: ['Employer', 'Job Seeker'],
        datasets: [{
          data: regionJobData, // Using the variable
          backgroundColor: ['#FFB300', '#FF6F00']
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });

  </script>





@endsection
