@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="position-relative">
            <!-- Cover Image -->
            <img src="assets/img/jobthing.jpg" class="card-img-top" alt="Cover Photo" style="height: 250px; object-fit: cover;">
        </div>
        
        <!-- Profile Content -->
        <div class="card-body position-relative">
        <!-- Edit Button -->
        <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-dark btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="z-index: 1000;">
            <i class="bi bi-pencil-fill me-2"></i>Edit Profile
        </button>
        </div>
        
        <!-- Profile Picture and Info -->
        <div class="translate-middle-y position-relative" style="top: -40px;">
            <div class="d-flex align-items-start">
                <div class="position-relative">
                    <div class="bg-white rounded-circle p-1">
                        <img src="assets/img/career.jpg"class="rounded-circle" width="120"height="120" style="object-fit: cover;">
                    </div>
                </div>
            </div>
            <div>
                <h3 class="fw-bold mb-1">{{ old('name', $user->name) }}</h3>
                <p class="text-muted">Data Analyst at IBM</p>
            </div>
        </div>
    </div>




                
                


            <!-- Stats List -->
            <div class="list-group list-group-flush mt-4">
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    Employment status
                    <span class="badge bg-primary rounded-pill">Jobless</span>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    Job offers
                    <span class="badge bg-primary rounded-pill">5</span>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    Your Connections
                    <span class="badge bg-primary rounded-pill">108</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>
</div>

@endsection