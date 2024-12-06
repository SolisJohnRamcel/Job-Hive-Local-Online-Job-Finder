@extends('admin.admin')

@section('content')
<div class="container mt-3">
    <div class="row bg-light shadow-sm py-3 mb-3">
        <div class="col d-flex justify-content-center align-items-center position-relative mb-3">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">List of users</h2>
        </div>
    </div>
</div>
<div class="container mt-5">

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Classification</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->jobrole }}</td>
        <td>
             <!-- Delete Button -->
             <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
            </form>
            <!-- View Profile Button -->
            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#profileModal{{ $user->id }}" 
                onclick="openProfile('{{ $user->name }}', '{{ $user->classification }}', '{{ $user->job_role }}', 
                '{{ $user->email }}', '{{ $user->bio }}', '{{ $user->profile_image }}', '{{ $user->cover_image }}')">View Profile</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@foreach($users as $user)
    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal{{ $user->id }}" tabindex="-1" aria-labelledby="profileModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel{{ $user->id }}">User Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <img src="{{ asset('storage/' . $user->profile_image) }}" id="profileImage{{ $user->id }}" class="img-fluid rounded-circle mb-3" alt="Profile Image" style="max-width: 150px;">
                            <h5 id="profileName{{ $user->id }}">Name: {{ $user->name }}</h5>
                            <p><strong>Job Role:</strong> {{ $user->jobrole }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Bio:</strong> {{ $user->bio }}</p>
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

<script>
function openProfile(name, classification, jobRole, email, bio, profileImage) {
    // Set the modal data dynamically
    document.getElementById('profileName').innerText = 'Name: ' + name;
    document.getElementById('profileJobRole').innerText = 'Job Role: ' + jobRole;
    document.getElementById('profileEmail').innerText = 'Email: ' + email;
    document.getElementById('profileBio').innerText = 'Bio: ' + bio;
    document.getElementById('profileImage').src = '/storage/' + profileImage; // Ensure the path is correct
}
</script>

@endsection
