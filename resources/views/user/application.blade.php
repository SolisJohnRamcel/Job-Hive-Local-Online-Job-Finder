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
                <button class="form-select" type="button" id="sortByDropdown" data-bs-toggle="dropdown" aria-expanded="false"  style="max-width: 200px;">
                Filter By Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortByDropdown">
                <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('all')">Show All</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('rejected')">Rejected</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('review')">In Review</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('interview')">Interview Scheduled</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterJobsByStatus('submitted')">Application Submitted</a></li>
                </ul>
        </div>
        </div>




                <!-- Job Applications Table -->
                <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                <tr>
                                        <th>No.</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Date Applied</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-status="review" onclick="selectRow(this)">
                                        <td>1</td>
                                        <td>Software Engineer</td>
                                        <td>Tech Solutions Inc.</td>
                                        <td><span class="badge bg-primary">In Review</span></td>
                                        <td>2024-11-15</td>
                                </tr>
                                <tr data-status="interview" onclick="selectRow(this)">
                                        <td>2</td>
                                        <td>Marketing Specialist</td>
                                        <td>Global Marketing Co.</td>
                                        <td><span class="badge bg-success">Interview Scheduled</span></td>
                                        <td>2024-11-18</td>
                                </tr>
                                <tr data-status="rejected" onclick="selectRow(this)">
                                        <td>3</td>
                                        <td>Data Analyst</td>
                                        <td>Data Insights Ltd.</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                        <td>2024-11-10</td>
                                </tr>
                                <tr data-status="submitted" onclick="selectRow(this)">
                                        <td>4</td>
                                        <td>Project Manager</td>
                                        <td>Tech Innovators</td>
                                        <td><span class="badge text-white" style="background-color: #656565;">Application Submitted</span></td>
                                        <td>2024-11-20</td>
                                </tr>
                                </tbody>
                        </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="jobActionModal" tabindex="-1" aria-labelledby="jobActionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-dark" style="background-color: #d7a343;">
                    <h5 class="modal-title" id="jobActionModalLabel">Job Application Actions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalJobTitle"></p>
                    <p><strong>Status:</strong> <span id="modalJobStatus"></span></p>
                    <p><strong>Date Applied:</strong> <span id="modalDateApplied"></span></p>
                    <div class="mt-3">
                        <!-- Replace View Details Button with Anchor -->
                        <a id="viewDetailsLink" class="btn btn-dark" href="#" role="button">View Details</a>
                        <button class="btn btn-secondary" onclick="cancelApplication()">Cancel Application</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
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
        document.getElementById('modalJobTitle').textContent = `Job Title: ${jobTitle}`;
        document.getElementById('modalJobStatus').textContent = jobStatus.trim();
        document.getElementById('modalDateApplied').textContent = dateApplied;

        // Show the modal
        const jobActionModal = new bootstrap.Modal(document.getElementById('jobActionModal'));
        jobActionModal.show();
        }

        function cancelApplication() {
                if (confirm("Are you sure you want to cancel this application?")) {
                alert("Application canceled.");
                }
        }


    </script>


@endsection