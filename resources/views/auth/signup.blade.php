@extends('layouts.guest')

@include('layouts.normal_header')

@section('content')
<div class="container min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-lg-4 col-md-6 col-10">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-5">
                        <h1 class="mb-1 h2 fw-bold">Sign Up to JobHive</h1>
                        <p>Welcome to JobHive! Enter your email to get started.</p>
                    </div>

                    <form class="needs-validation" action="{{route('signup.store')}}" method="POST">
                        @csrf
                        <div class="g-3 row">
                            <div class="col-12 mb-2">
                                <input placeholder="First Name" id="formSignupfname" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <input placeholder="Email" id="formSignupEmail" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <div class="position-relative">
                                    <input placeholder="*****" id="formSignupPassword" class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                                    <span class="password-toggle position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash" id="toggleSignupPasswordIcon"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="position-relative">
                                    <input placeholder="*****" id="formConfirmSignupPassword" class="form-control @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password">
                                    <span class="password-toggle position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash" id="toggleConfirmPasswordIcon"></i>
                                    </span>
                                    @error('confirm_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                Already have an account? <a class="text-decoration-none" style="color: #d49326;" href="/signin">Sign In</a>
                            </div>

                            <div class="d-grid col-12 mb-3">
                                <x-buttons.goldbutton type="submit">Register</x-buttons.goldbutton>
                            </div>
                        </div>
                        
                        <p class="text-center mb-0">
                            <small>By continuing, you agree to our <a class="text-decoration-none" style="color: #d49326;" href="#!">Terms of Service</a> & <a class="text-decoration-none" style="color: #d49326;" href="#!">Privacy Policy</a></small>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
