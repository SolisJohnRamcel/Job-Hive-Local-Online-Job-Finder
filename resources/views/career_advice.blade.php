<!-- resources/views/career page.blade.php -->
@extends('layouts.guest')
@include('layouts.header2')



@section('content')
    <!-- Hero Section -->
  <div class="hero">
    <img src="{{ URL('assets/img/jobthing.jpg') }}" alt="Hero Image">
    <div class="hero-text">How to Find a Job</div>
  </div>

  
  <div class="container tips-container">
    <h2 class="text-center mb-5">Tips for Finding a Job</h2>
    <div class="row g-4">
     
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fas fa-file-alt"></i>
          <h5 class="card-title">Update Your Resume</h5>
          <p class="card-text">Tailor your resume for each application, highlighting relevant skills and experiences.</p>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fab fa-linkedin"></i>
          <h5 class="card-title">Leverage LinkedIn</h5>
          <p class="card-text">Create a strong profile and connect with professionals in your field.</p>
        </div>
      </div>
     
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fas fa-handshake"></i>
          <h5 class="card-title">Network</h5>
          <p class="card-text">Attend industry events, job fairs, and meetups to build valuable connections.</p>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fas fa-search"></i>
          <h5 class="card-title">Use Job Boards</h5>
          <p class="card-text">Utilize websites like Indeed and Glassdoor for your job search.</p>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card p-4 text-center">
          <i class="fas fa-briefcase"></i>
          <h5 class="card-title">Consider Agencies</h5>
          <p class="card-text">Recruitment agencies can help match you with suitable job openings.</p>
        </div>
      </div>
    </div>
  </div>


<style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
    }

    
    .hero {
      position: relative;
      text-align: center;
      color: white;
    }

    .hero img {
      width: 100%;
      height: 50vh;
      object-fit: cover;
      filter: brightness(70%);
    }

    .hero .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 2.5rem;
      font-weight: bold;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    
    .tips-container {
      margin-top: -50px;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card i {
      font-size: 2rem;
      color: #f39c12;
      margin-bottom: 10px;
    }

    .card-title {
      font-size: 1.3rem;
      font-weight: bold;
    }
  </style>



@endsection