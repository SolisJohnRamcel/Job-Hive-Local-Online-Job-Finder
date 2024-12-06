@extends('employer.employer')

@section('content')
<div class="container mt-3">
    <div class="row bg-light shadow-sm py-3 mb-3">
        <div class="col d-flex justify-content-center align-items-center position-relative mb-3">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Company Profile</h2>
        </div>
    </div>
    
    <!-- Company Information Section -->
    <div class="container mt-5">
        <form method="POST" action="{{ route('company-profile.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Company Information Section -->
            <div class="row">
                <!-- Company Details Section -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header" style="background-color: #d7a343;">
                            Company Details
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control" id="companyName" value="{{ old('company_name', $companyProfile->company_name ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="companyEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="companyEmail" value="{{ old('email', $companyProfile->email ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="companyDescription" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="companyDescription" rows="4">{{ old('description', $companyProfile->description ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="companyLocation" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" id="companyLocation" value="{{ old('location', $companyProfile->location ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="companyWebsite" class="form-label">Website</label>
                                <input type="url" name="website" class="form-control" id="companyWebsite" value="{{ old('website', $companyProfile->website ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Logo and Contact Information Section -->
                <div class="col-md-6 d-flex flex-column">
                    <div class="card mb-auto">
                        <div class="card-header text-white" style="background-color: #414143;">
                            Company Logo
                        </div>
                    
                        <div class="card-body text-center">
                            <img src="{{ old( 'logo', 'https://via.placeholder.com/150') }}"  alt="Company Logo" class="img-fluid mb-3" id="companyLogo">
                            <div class="mb-3">
                                <input type="file" name="logo" class="form-control" id="logoInput" onchange="previewLogo()">
                            </div>
                            <p><small>Upload a new logo to replace the current one.</small></p>
                        </div>
                    </div>
                    <div class="card mt-auto">
                        <div class="card-header text-white" style="background-color: #646464;">
                            Contact Information
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="contactPerson" class="form-label">Contact Person</label>
                                <input type="text" name="contact_person" class="form-control" id="contactPerson" value="{{ old('contact_person', $companyProfile->contact_person ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="contactPhone" class="form-label">Phone Number</label>
                                <input type="tel" name="contact_phone" class="form-control" id="contactPhone" value="{{ old('contact_phone', $companyProfile->contact_phone ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Email Address</label>
                                <input type="email" name="contact_email" class="form-control" id="contactEmail" value="{{ old('contact_email', $companyProfile->contact_email ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Changes Button -->
            <div class="mt-4 text-start">
                <button type="submit" class="btn text-white" style="background-color: #414143;">Save Changes</button>
            </div>
        </form>
    </div>
</div>



<script>
    // JavaScript for Logo Preview
    function previewLogo() {
        const input = document.getElementById('logoInput');
        const preview = document.getElementById('companyLogo');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
