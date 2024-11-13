@extends('layouts.guest')

@include('layouts.normal_header')

@section('content')
<div class="container min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-lg-4 col-md-6 col-10">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-5">
                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="g-3 row">
                            <div class="col-12 mb-3">
                                <div class="position-relative">
                                    <input placeholder="Email"
                                        id="formForgetEmail"
                                        class="form-control @error('email') is-invalid @enderror"
                                        type="email"
                                        name="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2 col-12 mb-3">
                                <button class="btn btn-dark">{{ __('Email Password Reset Link') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
