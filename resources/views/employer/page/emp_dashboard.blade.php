@extends('employer.employer')

@section('content')
<div class="row bg-light shadow-sm py-3">
        <div class="col d-flex justify-content-between align-items-center position-relative">
            <h2 class="display-5 fw-bold mb-0" style="color: #d7a343; font-family: Poppins;">Dashboard</h2>
            <div class="position-absolute end-0 me-3">
                <a class="btn fw-bold shadow-sm" href="{{route('company_profile')}}" style="background-color: #ececec;"><i class="bi bi-buildings me-2"></i>Company Profile</a>
            </div>
        </div>
    </div>
@endsection