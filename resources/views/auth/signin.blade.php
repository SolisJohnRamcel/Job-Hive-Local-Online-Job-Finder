@extends('layouts.guest')
@include('layouts.normal_header')

@section('content')
<section class="min-vh-100 d-flex align-items-center" style="background: url('assets/img/shanghai2.jpg') center/cover fixed;">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 overflow-hidden shadow-lg">
                    <div class="row g-0">
                        <!-- Left Side - Hero Section -->
                        <div class="col-lg-6 d-flex" style="background: url('assets/img/img5.jpg') center/cover;">
                        </div>
                        <!-- Right Side - signin Form -->
                        <div class="col-lg-6 bg-white p-5">
                                <h1 class="mb-1 h2 fw-bold">Sign in to JobHive</h1>
                                <p>Welcome back to JobHive! Enter your email to get started.</p>
                                <form class="needs-validation" action="{{ route('signin.store') }}" method="POST">
                                @csrf
                                <div class="g-3 row">
                                    <div class="col-12 mb-2">
                                        <input placeholder="Email" id="formSigninEmail"
                                            class="form-control @error('email') is-invalid @enderror"
                                            type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="password-field position-relative">
                                            <input placeholder="*****" id="formSigninPassword"
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password" name="password">
                                            <span class="password-toggle position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                                                <i class="bi bi-eye-slash" id="toggleSigninPasswordIcon"></i>
                                            </span>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="form-check">
                                            <input id="remember" class="form-check-input" type="checkbox" name="remember">
                                            <label for="remember" class="form-check-label">Remember me</label>
                                        </div>
                                        <a class="text-decoration-none" style="color: #d49326;" href="/resetpass">Forgot password?</a>
                                    </div>

                                    <div class="d-grid col-12 mt-4">
                                        <x-buttons.goldbutton type="submit">Sign In</x-buttons.goldbutton>
                                    </div>

                                    <div class="text-center mt-3">
                                        Don't have an account? <a class="text-decoration-none" style="color: #d49326;" href="/signup">Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>                
@endsection
