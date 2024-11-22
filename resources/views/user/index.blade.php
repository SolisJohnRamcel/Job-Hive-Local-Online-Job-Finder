@extends('layouts.app')

@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 w-100">
        <div class="container">
            <img src="assets/img/Job Hive_icon.png" class="navbar-brand" alt="Job Finder Logo" style="max-width: 100px; max-height: 100px; object-fit: contain;">
            <form class="d-flex justify-content-center gap-3">
                <div class="input-group">
                    <input type="text" 
                        class="form-control" 
                        placeholder="Search for jobs" 
                        required>
                    <input type="text" 
                        class="form-control" 
                        placeholder="Location (e.g., Metro Manila)">
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1 class="mb-3 fw-bold" style="font-family: Poppins;">Find Your Next Job</h1>
            <p class="lead mb-4">Discover top jobs in your field and get hired quickly.</p>
        </div>
    </div>

    <!-- Job Listings -->
    <div class="container my-3">
        <h2 class="text-center mb-4">Job Listings</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card job-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Engineering</h5>
                        <p class="card-text"><strong>Company:</strong> JGC Philippines, Inc.</p>
                        <p class="card-text"><strong>Location:</strong> MuntiLupa, Metro Manila</p>
                        <a href="#" class="btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card job-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tourism</h5>
                        <p class="card-text"><strong>Company:</strong> Uni-Orient Travel, Inc.</p>
                        <p class="card-text"><strong>Location:</strong> Makati, Metro Manila</p>
                        <a href="#" class="btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card job-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Accounting</h5>
                        <p class="card-text"><strong>Company:</strong> Deloitte Consulting PDC</p>
                        <p class="card-text"><strong>Location:</strong> Taguig, Metro Manila</p>
                        <a href="#" class="btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Categories -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Explore Job Categories</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="assets/img/shanghai2.jpg" class="img-fluid mb-3" alt="IT Jobs">
                        <h5>IT & Software</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="assets/img/jobthing.jpg" class="img-fluid mb-3" alt="Marketing Jobs">
                        <h5>Marketing</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="assets/img/career.jpg" class="img-fluid mb-3" alt="Healthcare Jobs">
                        <h5>Healthcare</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="img4.png" class="img-fluid mb-3" alt="Finance Jobs">
                        <h5>Finance</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

@endsection