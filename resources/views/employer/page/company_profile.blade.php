@extends('employer.employer')

@section('content')
<div class="container mt-5">
        <div class="row bg-light shadow-sm py-3 mb-3">
            <div class="col d-flex justify-content-center align-items-center position-relative">
                <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Company Profile</h2>
            </div>
        </div>

        <!-- Company Information Section -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #d7a343;">
                        Company Details
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" value="Tech Innovators Ltd.">
                        </div>
                        <div class="mb-3">
                            <label for="companyEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="companyEmail" value="info@techinnovators.com">
                        </div>
                        <div class="mb-3">
                            <label for="companyDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="companyDescription" rows="4">We are a leading technology company specializing in innovative software solutions for businesses across the globe.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="companyLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="companyLocation" value="San Francisco, CA">
                        </div>
                        <div class="mb-4">
                            <label for="companyWebsite" class="form-label">Website</label>
                            <input type="url" class="form-control" id="companyWebsite" value="https://www.techinnovators.com">
                        </div>
                        <button class="btn text-white"  style="background-color: #414143;">Save Changes</button>
                    </div>
                </div>
            </div>

            <!-- Company Logo Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #414143;">
                        Company Logo
                    </div>
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Company Logo" class="img-fluid mb-3" id="companyLogo">
                        <div class="mb-3">
                            <button class="btn text-white" style="background-color: #414143;">Change Logo</button>
                        </div>
                        <p><small>Click the button above to upload a new logo.</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white"  style="background-color: #646464;">
                        Contact Information
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="contactPerson" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="contactPerson" value="John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="contactPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="contactPhone" value="123-456-7890">
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="contactEmail" value="john.doe@techinnovators.com">
                        </div>
                        <button class="btn text-white"  style="background-color: #414143;">Save Contact Info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection