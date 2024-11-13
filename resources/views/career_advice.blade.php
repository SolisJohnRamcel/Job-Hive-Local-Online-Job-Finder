<!-- resources/views/career page.blade.php -->
@extends('layouts.guest')
@include('layouts.header2')



@section('content')
        <div class="container mt-4 mt-lg-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 px-3 px-lg-5">
                    <!-- Heading -->
                    <h1 class="mt-4 mt-lg-5 mb-4 text-center text-lg-start">How to find a Job</h1>

                    <!-- Card -->
                    <div class="card border-0 shadow-sm mb-4 rounded-3">
                        <div class="position-relative">
                            <img class="img-fluid w-100"
                                src="{{ URL('assets/img/jobthing.jpg') }}"
                                alt="Job Image"
                                style="object-fit: cover; border-radius: 10px; max-height: 660px;">
                        </div>
                    </div>

                    <!-- Tips Section -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <h1 class="mt-4 mt-lg-5 mb-4 text-center">Tips for Finding a Job</h1>
                            <ol class="text-start ps-4">
                                <li class="mb-3"><strong>Update Your Resume:</strong> Tailor your resume for each application, highlighting relevant skills and experiences.</li>
                                
                                <li class="mb-3"><strong>Leverage LinkedIn:</strong> Create a strong LinkedIn profile. Connect with professionals in your field and engage with content related to your interests.</li>
                                
                                <li class="mb-3"><strong>Network:</strong> Attend industry events, job fairs, and meetups. Informational interviews can also be valuable.</li>
                                
                                <li class="mb-3"><strong>Use Job Boards Wisely:</strong> Utilize job search websites (like Indeed, Glassdoor, and LinkedIn) but also check company websites directly.</li>
                                
                                <li class="mb-3"><strong>Consider Recruitment Agencies:</strong> They can help match you with job openings suited to your skills.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection