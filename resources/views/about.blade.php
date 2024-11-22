<!-- resources/views/home-page.blade.php -->
@extends('layouts.guest')
@include('layouts.header2')


@section('content')
<!-- Hero Banner with Background Image -->
<section class="hero-section position-relative vh-50" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/img/shanghai2.jpg') center/cover;">
    <div class="container h-50">
        <div class="row h-100 align-items-center">
            <div class="col-md-12 text-center text-white">
                <h1 class="display-3 fw-bold mb-4">About JobHive</h1>
                <p class="lead fs-4 mb-0">Connecting Talent with Opportunity</p>
            </div>
        </div>
    </div>
</section>

<!-- Company Overview Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold display-5 mb-4">Who We Are</h2>
                <p class="lead mb-4 fs-3">JobHive provides a dynamic platform that brings companies and job seekers together in a lively, approachable setting, increasing the effectiveness and enjoyment of the hiring process for all parties.</p>
                <p class="mb-4 fs-4">We envision a society in which locating employment shouldn't be difficult or time-consuming. Job Hive makes sure that every job seeker discovers possibilities that are specific to their abilities and career goals, and that employers can quickly identify talent that meets their particular requirements.</p>
            </div>
            <div class="col-lg-6">
                <img src="assets/img/Job Hive_icon.png" alt="Our Team" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Core Values</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="bi bi-shield-check display-4 text-primary"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Transparency</h4>
                        <p class="text-muted">Creating a reliable environment for businesses and candidates alike.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="bi bi-rocket-takeoff display-4 text-primary"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Empowerment</h4>
                        <p class="text-muted">Helping people take charge of their professional paths.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="bi bi-lightbulb display-4 text-primary"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Innovation</h4>
                        <p class="text-muted">Constantly evolving to meet the demands of a shifting job market.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-4">
                            <i class="bi bi-people display-4 text-primary custom-color" style="custom-color: #947439;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Community</h4>
                        <p class="text-muted">Fostering development, education, and meaningful connections.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Provide Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-4">What We Provide</h2>
                <p class="lead mb-5">Job Hive is designed to save time, increase productivity, and deliver a helpful experience—from tailored job recommendations to smooth application procedures.</p>
                <a href="/signup" class="btn btn-lg rounded-pill text-white px-5 py-3" style="background-color: #947439;">Join Our Platform</a>
            </div>
        </div>
    </div>
</section>


@endsection