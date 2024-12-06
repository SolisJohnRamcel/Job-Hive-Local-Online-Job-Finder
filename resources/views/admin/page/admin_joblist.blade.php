@extends('admin.admin')

@section('content')
<div class="container mt-3">
    <div class="row bg-light shadow-sm py-3 mb-3">
        <div class="col d-flex justify-content-center align-items-center position-relative mb-3">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Joblist</h2>
        </div>
    </div>
</div>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Job ID</th>
                <th>Title</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Salary Range</th>
                <th>Work Type</th>
                <th>Job Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->company_name }}</td>
                    <td>{{ $job->location }}</td>
                    <td>{{ $job->salary_min }} - {{ $job->salary_max }}</td>
                    <td>{{ $job->work_type }}</td>
                    <td>{{ $job->job_category }}</td>
                    <td>
                        <!-- Button to trigger modal -->
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#jobModal{{ $job->id }}">
                            View Job
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($jobs as $job)
<!-- Job Profile Modal -->
<div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1" aria-labelledby="jobModalLabel{{ $job->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobModalLabel{{ $job->id }}">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="{{ asset('storage/' . $job->job_img) }}" class="img-fluid rounded mb-3" alt="Job Image" style="max-width: 150px;">
                        <h5>Title: {{ $job->title }}</h5>
                        <p><strong>Company Name:</strong> {{ $job->company_name }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <p><strong>Salary Range:</strong> {{ $job->salary_min }} - {{ $job->salary_max }}</p>
                        <p><strong>Work Type:</strong> {{ $job->work_type }}</p>
                        <p><strong>Job Category:</strong> {{ $job->job_category }}</p>
                        <p><strong>Additional Info:</strong> {{ $job->additional_info }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Bootstrap JS (Optional for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
