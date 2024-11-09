<main>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6 col-12 order-lg-2 offset-lg-1 order-1">
                <div class="mb-lg-9 mb-5">
                    <h1 class="mb-1 h2 fw-bold">Sign Up to JobHive</h1>
                    <p>Welcome to JobHive! Enter your email to get started.</p>
                </div>
                <form class="needs-validation" action="{{route("signup.store")}}" method="POST">
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

                    <div class="col-12 mb-1">
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

                    <div class="dont-have">Already have an account? <a class="text-decoration-none" style="color: #d49326;" href="/signin">Sign In</a></div>


                        <div class="d-grid col-12 mb-2">
                            <x-buttons.goldbutton type="submit">Register</x-buttons.goldbutton>
                        </div>
                    </div>
                    <p class="text-center">
                        <small>By continuing, you agree to our <a class="text-decoration-none" style="color: #d49326;" href="#!">Terms of Service</a> & <a class="text-decoration-none" style="color: #d49326;" href="#!">Privacy Policy</a></small>
                    </p>
                </form>
            </div>
        </div>
    </div>
</main>
