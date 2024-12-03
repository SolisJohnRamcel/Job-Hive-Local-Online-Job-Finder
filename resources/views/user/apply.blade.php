@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header py-3" style="background-color: #d7a343;">
            <h1 class="card-title text-center text-dark mb-0">Job Application Form</h1>
        </div>
      <div class="card-body">
        <p class="text-center mb-5">Please Fill Out the Form Below to Submit Your Job Application!</p>


        <form id="applicationForm" action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="job_id" id="job_id" value="{{ $job->id }}">
          <div class="row mb-3">
              <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstName" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                  @error('first_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastName" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                  @error('last_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="ex: myname@example.com" value="{{ old('email') }}">
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="phoneNumber" class="form-label">Phone Number</label>
              <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phoneNumber" name="phone_number" placeholder="(000) 000-0000" value="{{ old('phone_number') }}">
              @error('phone_number')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="appliedPosition" class="form-label">Applied Position</label>
              <input type="text" class="form-control @error('applied_position') is-invalid @enderror" id="appliedPosition" name="applied_position" placeholder="Position Name" value="{{ old('applied_position') }}">
              @error('applied_position')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="startDate" class="form-label">Earliest Possible Start Date</label>
              <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="startDate" name="start_date" value="{{ old('start_date') }}">
              @error('start_date')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="interviewDate" class="form-label">Preferred Interview Date</label>
              <div class="row">
                  <div class="col-md-6">
                      <input type="date" class="form-control @error('interview_date') is-invalid @enderror" id="interviewDate" name="interview_date" value="{{ old('interview_date') }}">
                      @error('interview_date')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="col-md-6">
                      <select class="form-select @error('time_slot') is-invalid @enderror" id="timeSlot" name="time_slot">
                          <option selected disabled>Choose Time Slot</option>
                          <option value="2:00 PM" {{ old('time_slot') == '2:00 PM' ? 'selected' : '' }}>2:00 PM</option>
                          <option value="3:00 PM" {{ old('time_slot') == '3:00 PM' ? 'selected' : '' }}>3:00 PM</option>
                      </select>
                      @error('time_slot')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
          </div>
          <div class="mb-5">
              <label for="resume" class="form-label">Upload Resume</label>
              <input type="file" class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume">
              @error('resume')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-dark mb-2">Submit Application</button>
          </div>
      </form>
      </div>
    </div>
  </div>


<script>
  document.getElementById('applicationForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent form submission
      // Show alert message
      alert('Application Submitted Successfully!');
      // Optionally, submit the form after showing the message
      this.submit();
  });
</script>
  


@endsection