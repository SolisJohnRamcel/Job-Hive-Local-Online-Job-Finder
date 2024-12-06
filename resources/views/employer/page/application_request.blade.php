@extends('employer.employer')

@section('content')
<div class="container mt-5">
  <div class="row bg-light align-items-center text-center py-3 shadow-sm mb-5">
    <div class="col-12">
      <h1 class="fw-bold text-center" style="color: #d7a343; font-family: Poppins;">Application Request</h1>
    </div>
  </div>

<!-- Filter by status and sort options -->
<div class="d-flex flex-column flex-sm-row justify-content-between gap-3 mb-3">
    <form method="GET" action="{{ route('application.sort') }}">
        <select class="form-select" id="sortedby" name="sortedby" aria-label="Sorted By Date" style="max-width: 200px;">
            <option value="" selected disabled>Sort by</option>
            <option value="date_newest" {{ request('sortedby') == 'date_newest' ? 'selected' : '' }}>Newest First</option>
            <option value="date_oldest" {{ request('sortedby') == 'date_oldest' ? 'selected' : '' }}>Oldest First</option>
        </select>
    </form>
</div>

<!-- Status-specific tables -->
@foreach (['waiting to be reviewed', 'in review', 'interview scheduled', 'accepted', 'rejected'] as $status)
    <h1 class="fw-bold text-start mb-3 bg-light shadow-sm" style="color: #d7a343; font-family: Poppins;">
        {{ ucfirst(str_replace('_', ' ', $status)) }}
    </h1>
    
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th width="10%">Time</th>
                    <th>Applicant name</th>
                    <th>Job title</th>
                    <th>Status</th>
                    <th width="15%">Actions</th>
                    <th>View details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications->where('status', $status) as $application)
                <tr id="row-{{ $application->id }}" data-id="{{ $application->id }}">
                    <td>{{ $application->created_at->diffForHumans() }}</td>
                    <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                    <td>{{ $application->job->title }}</td>
                    <td>{{ $application->status }}</td>
                    <td>
                        @if($status == 'waiting to be reviewed')
                            <button type="button" class="btn btn-primary btn-sm text-nowrap update-status" data-status="in review" data-id="{{ $application->id }}">Review</button>
                            <button type="button" class="btn btn-danger btn-sm text-nowrap update-status" data-status="rejected" data-id="{{ $application->id }}">Reject</button>
                        @elseif($status == 'in review')
                            <button type="button" class="btn btn-success btn-sm text-nowrap update-status" data-status="interview scheduled" data-id="{{ $application->id }}">Interview</button>
                            <button type="button" class="btn btn-danger btn-sm text-nowrap update-status" data-status="rejected" data-id="{{ $application->id }}">Reject</button>
                        @elseif($status == 'interview scheduled')
                            <button type="button" class="btn btn-success btn-sm text-nowrap update-status" data-status="accepted" data-id="{{ $application->id }}">Accept</button>
                            <button type="button" class="btn btn-danger btn-sm text-nowrap update-status" data-status="rejected" data-id="{{ $application->id }}">Reject</button>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#applicantModal-{{ $application->id }}">View</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endforeach

<!-- Modals -->
@foreach($applications as $application)
<div class="modal fade" id="applicantModal-{{ $application->id }}" tabindex="-1" aria-labelledby="applicantModalLabel-{{ $application->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applicantModalLabel-{{ $application->id }}">Applicant Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Applicant:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
        <p><strong>Job Title:</strong> {{ $application->job->title }}</p>
        <p><strong>Applied Position:</strong> {{ $application->applied_position }}</p>
        <div class="pdf-viewer mb-3" style="border: 1px solid #ddd; height: 500px; overflow: hidden;">
          <iframe src="{{ asset('storage/' . $application->resume) }}" width="100%" height="100%" style="border: none;"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', function() {
            const status = this.getAttribute('data-status');
            const applicationId = this.getAttribute('data-id');

            fetch(`/application/update-status/${applicationId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                // Update the status on the page
                const statusCell = document.querySelector(`#row-${applicationId} td:nth-child(4)`);
                statusCell.textContent = data.status; // Update the status text
            })
            .catch(error => {
                console.error('Error updating status:', error);
            });
        });
    });
</script>


@endsection
