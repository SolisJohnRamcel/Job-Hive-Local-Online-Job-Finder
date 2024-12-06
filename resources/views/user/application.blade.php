@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="row bg-light shadow-sm py-3 mb-5">
                <div class="col d-flex justify-content-center align-items-center position-relative">
                    <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Job Applications</h2>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="mb-3">
                <!-- Sort By Dropdown -->
                <div class="dropdown">
                    <button class="form-select" type="button" id="sortByDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="max-width: 200px;">
                        Filter By Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortByDropdown">
                        <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('all')">Show All</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('rejected')">Accepted</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('rejected')">Rejected</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('in-review')">In Review</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('interview-scheduled')">Interview Scheduled</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('waiting-to-be-reviewed')">Waiting to be Reviewed</a></li>
                    </ul>
                </div>
            </div>

            <!-- Job Applications Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="jobsTable">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Applicant name</th>
                            <th>Status</th>
                            <th>Date Applied</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobApplications as $index => $application)
                        <tr data-status="{{ strtolower(str_replace(' ', '-', $application->status)) }}" onclick="selectRow(this)">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $application->job->title }}</td>
                                <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                                <td>
                                @if($application->status === 'in review')
                                        <span class="badge bg-primary">In Review</span>
                                @elseif($application->status === 'interview scheduled')
                                        <span class="badge bg-success">Interview Scheduled</span>
                                @elseif($application->status === 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                @elseif($application->status === 'accepted')
                                        <span class="badge bg-success">Accepted</span>        
                                @elseif($application->status === 'waiting to be reviewed')
                                        <span class="badge text-white" style="background-color: #656565;">Waiting to be Reviewed</span>
                                @endif
                                </td>
                                <td>{{ $application->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach($jobApplications as $index => $application)
<div class="modal fade" id="jobActionModal" tabindex="-1" aria-labelledby="jobActionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-dark" style="background-color: #d7a343;">
                <h5 class="modal-title" id="jobActionModalLabel">Job Application Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Job Title:</strong> <span id="modalJobTitle"></span></p>
                <p><strong>Status:</strong> <span id="modalJobStatus"></span></p>
                <p class="mb-5"><strong>Date Applied:</strong> <span id="modalDateApplied"></span></p>

                <div class="pdf-viewer" style="border: 1px solid #ddd; height: 500px; overflow: hidden;">
                    <iframe src="{{ asset('storage/' . $application->resume) }}" width="100%" height="100%" style="border: none;"></iframe>
                </div>

                <div class="mt-3">
                    <form id="canceljobapplication" action="{{ route('application.delete', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" onclick="cancelApplication(event)">Cancel Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    function filterJobsByStatus(status) {
    let rows = document.querySelectorAll('#jobsTable tbody tr');

    rows.forEach(row => {
        // Show all rows if 'all' is selected
        if (status === 'all') {
            row.style.display = '';
        } else {
            // Show only rows matching the selected status
            row.style.display = row.getAttribute('data-status') === status ? '' : 'none';
        }
    });
}


    function selectRow(row) {
        // Get job details from the selected row
        const jobTitle = row.cells[1].textContent; // Job Title
        const jobStatus = row.cells[3].textContent; // Status
        const dateApplied = row.cells[4].textContent; // Date Applied

        // Populate the modal with the job details
        document.getElementById('modalJobTitle').textContent = `${jobTitle}`;
        document.getElementById('modalJobStatus').textContent = jobStatus.trim();
        document.getElementById('modalDateApplied').textContent = dateApplied;

        // Show the modal
        const jobActionModal = new bootstrap.Modal(document.getElementById('jobActionModal'));
        jobActionModal.show();
    }

    function cancelApplication(event) {
    event.preventDefault(); // Prevent the default button behavior

    const userConfirmed = confirm("Are you sure you want to cancel this application?");
    if (userConfirmed) {
        // Submit the form if the user confirms
        event.target.closest('form').submit();
    } else {
        // Do nothing if the user cancels
        alert("Action canceled. Your application remains active.");
    }
}

function cancelApplication(event) {
    event.preventDefault(); // Prevent the default button behavior

    // Get the job status from the modal
    const jobStatus = document.getElementById('modalJobStatus').textContent.trim().toLowerCase();

    // Check if the application is in an un-cancelable status
    if (jobStatus === 'in review' || jobStatus === 'interview scheduled') {
        alert("You cannot cancel your application while it is in review or interview scheduled.");
        return; // Stop further execution
    }

    const userConfirmed = confirm("Are you sure you want to cancel this application?");
    if (userConfirmed) {
        // Submit the form if the user confirms
        event.target.closest('form').submit();
    } else {
        // Do nothing if the user cancels
        alert("Action canceled. Your application remains active.");
    }
}





</script>
@endsection
