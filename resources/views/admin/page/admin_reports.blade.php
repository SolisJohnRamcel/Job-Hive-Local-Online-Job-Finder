@extends('admin.admin')

@section('content')
<div class="container mt-3">
    <div class="row bg-light shadow-sm py-3 mb-3">
        <div class="col d-flex justify-content-center align-items-center position-relative mb-3">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Contact Message</h2>
        </div>
    </div>
</div>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contact as $con)
                <tr>
                    <td>{{ $con->name }}</td>
                    <td>{{ $con->email }}</td>
                    <td>{{ $con->phone ?? 'N/A' }}</td>
                    <td>{{ $con->message }}</td>
                    <td>{{ $con->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.contact.delete', $con->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
