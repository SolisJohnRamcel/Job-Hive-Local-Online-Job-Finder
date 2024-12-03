@extends('employer.employer')

@section('content')
<div class="container mt-5">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Report ID</th>
        <th>Report Info</th>
        <th>Report Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>101</td>
        <td>Sample Report 1</td>
        <td>Pending</td>
        <td>
          <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#responseModal" onclick="showResponse('Accept', 'Sample Report 1')">Accept</button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#responseModal" onclick="showResponse('Reject', 'Sample Report 1')">Reject</button>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>102</td>
        <td>Sample Report 2</td>
        <td>Pending</td>
        <td>
          <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#responseModal" onclick="showResponse('Accept', 'Sample Report 2')">Accept</button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#responseModal" onclick="showResponse('Reject', 'Sample Report 2')">Reject</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="responseModalLabel">Report Response</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="responseMessage"></p>
        <div class="mb-3">
          <label for="feedback" class="form-label">Provide your feedback:</label>
          <textarea class="form-control" id="feedback" rows="4" placeholder="Write your feedback here..."></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitFeedback()">Submit Feedback</button>
      </div>
    </div>
  </div>
</div>
<script>
  let currentAction = '';
  let currentReportInfo = '';

  function showResponse(action, reportInfo) {
    currentAction = action;
    currentReportInfo = reportInfo;
    const responseMessage = `You have ${action} the report: "${reportInfo}".`;
    document.getElementById('responseMessage').textContent = responseMessage;
    document.getElementById('feedback').value = '';
  }

  function submitFeedback() {
    const feedback = document.getElementById('feedback').value;
    if (feedback.trim() !== '') {
      alert(`Feedback submitted for the report: "${currentReportInfo}".\nAction: ${currentAction}\nFeedback: ${feedback}`);
      const modal = bootstrap.Modal.getInstance(document.getElementById('responseModal'));
      modal.hide();
    } else {
      alert('Please provide feedback before submitting.');
    }
  }
</script>
@endsection