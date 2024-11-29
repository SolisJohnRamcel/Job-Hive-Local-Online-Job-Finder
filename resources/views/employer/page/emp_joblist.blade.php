@extends('employer.employer')

@section('content')
        <div class="container-fluid container-lg mt-5">
        <!-- Header -->
        <div class="row bg-light align-items-center text-center py-3 shadow-sm mb-4">
                <div class="col-12">
                <h1 class="fw-bold text-center" style="color: #d7a343; font-family: Poppins;">Create your Joblist</h1>
                </div>
        </div>

        <!-- Controls -->
        <div class="d-flex flex-column flex-sm-row justify-content-between gap-3 mb-3">
                <select class="form-select" id="sortedbyrelevance" name="sortedbyrelevance" aria-label="Sorted By Relevance" style="max-width: 200px;">
                <option value="" selected disabled>Sorted by relevance</option>
                <option value="Relevance">Relevance</option>
                <option value="Date">Date</option>
                </select>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddJobs">
                <i class="bi bi-file-earmark-plus me-2"></i>Add new jobs
                </button>
        </div>

        <!-- Table -->
        <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <thead class="table-dark">
                        <tr>
                        <th width="10%">Time</th>
                        <th>Job Title</th>
                        <th width="25%">Actions</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach($joblist as $job)
                        <tr>
                        <td>{{ $job->created_at->diffForHumans() }}</td>
                        <td>{{ $job->title }}</td>
                        <td>
                                <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editJobModal{{ $job->id }}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <form action="{{ route('joblist.destroy', $job->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                        </button>
                                </form>

                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ViewJobModal{{ $job->id }}">
                                        <i class="bi bi-eye"></i> View
                                </button>
                                </div>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
                </table>
        </div>
        </div>



        <!-- Modal add Jobs -->
        <div class="modal fade" id="modalAddJobs" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                                <div class="modal-header text-dark" style="background-color: #d7a343;">
                                <h5 class="modal-title">Create a Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                        <div class="modal-body">
                        <div class="container-fluid">
                                <form method="POST" action="{{ route('joblist.store') }}"enctype="multipart/form-data">
                                @csrf
                                <!-- cover image -->
                                <div class="position-relative mb-3">
                                        <!-- Cover Image -->
                                        <img id="create-preview" src="{{ old('job_cover_photo', asset('assets/img/default-image.jpg')) }}" class="card-img-top" alt="Cover_Photo" style="height: 250px; object-fit: cover;">
                                        
                                        <!-- Edit Button -->
                                        <div class="position-absolute top-0 end-0 m-3">
                                        <label for="create_cover_photo">  <!-- Changed from job_cover_photo -->
                                        <span class="btn btn-dark btn-sm rounded-circle">
                                                <i class="bi bi-camera"></i>
                                        </span>
                                        </label>
                                        <input type="file" class="d-none" id="create_cover_photo" name="job_cover_photo" data-preview-target="create-preview">

                                        </div>
                                </div>
                                 <!-- company/job image -->
                           
                                <div class="position-relative mb-3">
                                
                                <img id="create-job-preview" src="{{ old('job_img',asset('assets/img/default-image.jpg')) }}" 
                                        class="img-fluid mb-3" 
                                        alt="Job Image" 
                                        style="height: 50px; width: 100px; object-fit: cover;">
                                        <label for="create_job_img">  <!-- Changed from job_img -->
                                        <span class="btn btn-dark btn-sm rounded-circle">
                                                <i class="bi bi-pencil-fill"></i>
                                        </span>
                                        </label>
                                        <input type="file" class="d-none" id="create_job_img" name="job_img" data-preview-target="create-job-preview">
                                
                                </div>
                                      
                              
                                <!-- title -->
                                <div class="mb-3">
                                        <label for="title">Job Title</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                        @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <!-- company name -->
                                <div class="mb-3">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}">
                                        @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <!-- location -->
                                <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                                        @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <!-- salary min max -->
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="fw-medium">₱</span>
                                                <div class="form-group">
                                                <input type="number"
                                                        id="salary_min"
                                                        name="salary_min"
                                                        class="form-control form-control-sm"
                                                        placeholder="Salary Min"
                                                        value="{{ old('salary_min') }}"
                                                        style="min-width: 120px; max-width: 150px;">
                                               
                                                </div>
                                                
                                                <span class="fw-medium">– ₱</span>
                                                
                                                <div class="form-group">
                                                <input type="number"
                                                        id="salary_max"
                                                        name="salary_max"
                                                        class="form-control form-control-sm "
                                                        placeholder="Salary Max"
                                                        value="{{ old('salary_max') }}"
                                                        style="min-width: 120px; max-width: 150px;">
                                
                                                </div>
                                                
                                                <span class="fw-medium">per month</span>
                                        </div>
                                </div>

                                <!-- Work Types -->
                                <div class="mb-3">
                                <label for="work_type" class="form-label">Work Type:</label>
                                <select 
                                        class="form-select @error('work_type') is-invalid @enderror" 
                                        id="work_type" 
                                        name="work_type" 
                                        aria-label="Work Types" 
                                        style="width:160px;"
                                >
                                        <option value="" selected disabled>All Work Types</option>
                                        <option value="Full time" {{ old('work_type') == 'Full time' ? 'selected' : '' }}>Full time</option>
                                        <option value="Part time" {{ old('work_type') == 'Part time' ? 'selected' : '' }}>Part time</option>
                                        <option value="Contract/Temp" {{ old('work_type') == 'Contract/Temp' ? 'selected' : '' }}>Contract/Temp</option>
                                        <option value="Casual/Vacation" {{ old('work_type') == 'Casual/Vacation' ? 'selected' : '' }}>Casual/Vacation</option>
                                </select>
                                @error('work_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>

                                <!-- job Category -->
                                <div class="mb-3">
                                <label for="job_category" class="form-label">Job Category</label>
                                        <input type="text" name="job_category" id="job_category" class="form-control @error('job_category') is-invalid @enderror" value="{{ old('job_category') }}">
                                        @error('job_category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <!-- additional info -->
                                <div class="mb-3">
                                <label for="additional_info" class="form-label">Additional Information</label>
                                <textarea class="form-control @error('additional_info') is-invalid @enderror" rows="4" id="additional_info" name="additional_info" >{{ old('additional_info') }}</textarea>
                                @error('additional_info')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">Create</button>
                                </div>

                                </form>
                        </div>
                        </div>
                        
                </div>
                </div>
        </div>


        <!-- update -->
        @foreach($joblist as $job)
        <div class="modal fade" id="editJobModal{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                                <div class="modal-header text-dark" style="background-color: #d7a343;">
                                <h5 class="modal-title">Update the Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                        <div class="modal-body">
                        <div class="container-fluid">
                        <form method="POST" action="{{ route('joblist.update', $job->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Cover Image -->
                        <div class="position-relative mb-3">
                                <img id="update-preview-{{ $job->id }}" src="{{ $job->job_cover_photo ? asset('storage/' . $job->job_cover_photo) : asset('assets/img/default-image.jpg') }}" 
                                class="card-img-top" 
                                alt="Cover Photo" 
                                style="height: 250px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 m-3">
                                <label for="update_cover_photo_{{ $job->id }}">
                                <span class="btn btn-dark btn-sm rounded-circle">
                                        <i class="bi bi-camera"></i>
                                </span>
                                </label>
                                <input type="file" class="d-none" id="update_cover_photo_{{ $job->id }}" name="job_cover_photo" data-preview-target="update-preview-{{ $job->id }}">

                                </div>
                        </div>

                        <!-- Job Image -->
                        <div class="position-relative mb-3">
                                <img id="update-job-preview-{{ $job->id }}" src="{{ $job->job_img ? asset('storage/' . $job->job_img) : asset('assets/img/default-image.jpg') }}" 
                                class="img-fluid mb-3" 
                                alt="Job Image" 
                                style="height: 50px; width: 100px; object-fit: cover;">
                                <label for="update_job_img_{{ $job->id }}">
                                        <span class="btn btn-dark btn-sm rounded-circle">
                                        <i class="bi bi-pencil-fill"></i>
                                        </span>
                                </label>
                                <input type="file" class="d-none" id="update_job_img_{{ $job->id }}" name="job_img" data-preview-target="update-job-preview-{{ $job->id }}">
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                                <label for="title">Job Title</label>
                                <input type="text" name="title" id="title" 
                                class="form-control @error('title') is-invalid @enderror" 
                                value="{{ old('title', $job->title) }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Company Name -->
                        <div class="mb-3">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" id="company_name" 
                                class="form-control @error('company_name') is-invalid @enderror" 
                                value="{{ old('company_name', $job->company_name) }}">
                                @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                                <label for="location">Location</label>
                                <input type="text" name="location" id="location" 
                                class="form-control @error('location') is-invalid @enderror" 
                                value="{{ old('location', $job->location) }}">
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Salary Min and Max -->
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                <div class="form-group">
                                <input type="number" id="salary_min" name="salary_min" 
                                        class="form-control form-control-sm" 
                                        placeholder="Salary Min" 
                                        value="{{ old('salary_min', $job->salary_min) }}" 
                                        style="min-width: 120px; max-width: 150px;">
                                </div>
                                <span class="fw-medium">–</span>
                                <div class="form-group">
                                <input type="number" id="salary_max" name="salary_max" 
                                        class="form-control form-control-sm" 
                                        placeholder="Salary Max" 
                                        value="{{ old('salary_max', $job->salary_max) }}" 
                                        style="min-width: 120px; max-width: 150px;">
                                </div>
                                <span class="fw-medium">per month</span>
                        </div>

                        <!-- Work Type -->
                        <div class="mb-3">
                                <label for="work_type">Work Type</label>
                                <select class="form-select @error('work_type') is-invalid @enderror" id="work_type" name="work_type">
                                <option value="" disabled selected>All Work Types</option>
                                <option value="Full time" {{ old('work_type', $job->work_type) == 'Full time' ? 'selected' : '' }}>Full time</option>
                                <option value="Part time" {{ old('work_type', $job->work_type) == 'Part time' ? 'selected' : '' }}>Part time</option>
                                <option value="Contract/Temp" {{ old('work_type', $job->work_type) == 'Contract/Temp' ? 'selected' : '' }}>Contract/Temp</option>
                                <option value="Casual/Vacation" {{ old('work_type', $job->work_type) == 'Casual/Vacation' ? 'selected' : '' }}>Casual/Vacation</option>
                                </select>
                                @error('work_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Job Category -->
                        <div class="mb-3">
                                <label for="job_category">Job Category</label>
                                <input type="text" name="job_category" id="job_category" 
                                class="form-control @error('job_category') is-invalid @enderror" 
                                value="{{ old('job_category', $job->job_category) }}">
                                @error('job_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Additional Information -->
                        <div class="mb-3">
                                <label for="additional_info">Additional Information</label>
                                <textarea class="form-control @error('additional_info') is-invalid @enderror" 
                                rows="4" id="additional_info" name="additional_info">{{ old('additional_info', $job->additional_info) }}</textarea>
                                @error('additional_info')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">Save</button>
                        </div>
                        </form>

                        </div>
                        </div>
                        
                </div>
                </div>
        </div>
        @endforeach



        @foreach($joblist as $job)
        <div class="modal fade" id="ViewJobModal{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                                <div class="modal-header text-dark" style="background-color: #d7a343;">
                                <h5 class="modal-title">View Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                        <div class="modal-body">
                        <div class="container-fluid">
                        
                        <div class="position-relative mb-3">
                                <img src="{{ asset('storage/' . $job->job_cover_photo) }}"class="card-img-top" 
                                alt="Cover Photo" 
                                style="height: 250px; object-fit: cover;" >
                        </div>

                        <div class="position-relative mb-3">
                                <img src="{{ asset('storage/' . $job->job_img) }}" class="card-img-top" 
                                alt="Cover Photo" 
                                style="height: 50px; width: 100px; object-fit: cover;">
                        </div>
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ $job->company_name  }}</p>
                        <div class="mb-3">
                        <p class="card-text mb-0">{{ $job->location }}</p>
                        <p class="card-text mb-0"> ₱{{ number_format($job->salary_min) }} – ₱{{ number_format($job->salary_max) }} per month</p>
                        <p class="card-text mb-3">{{ $job->job_category  }}</p>
                        <p class="card-text mb-3 text-secondary ">{{ $job->created_at->diffForHumans() }}</p>
                        <p class="card-text">{{ $job->additional_info }}</p>
                        </div>




                        </div>
                        </div>
                        
                </div>
                </div>
        </div>       
        @endforeach




<!-- scripts -->
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('modalAddJobs'));
            modal.show();
        });
    </script>
@endif
<script>
        document.addEventListener('DOMContentLoaded', function() {
    // Event delegation for dynamically handling file input changes
    document.body.addEventListener('change', function(e) {
        if (e.target.type === 'file') {
            const file = e.target.files[0]; // Get the uploaded file
            const previewId = e.target.getAttribute('data-preview-target'); // Get target preview id
            const previewElement = document.getElementById(previewId); // Find preview element
            
            // Check if the file and preview element exist
            if (file && previewElement) {
                const reader = new FileReader(); // Create a FileReader instance
                reader.onload = function(event) {
                    previewElement.src = event.target.result; // Update preview element's src
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            } else if (!previewElement) {
                console.error(`Preview element with ID "${previewId}" not found.`);
            }
        }
    });
});

</script>


@endsection