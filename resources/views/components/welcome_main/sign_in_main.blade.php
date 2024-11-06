<main>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6 col-10 order-lg-2 offset-lg-1 order-1">
                <div class="mb-5">
                    <h1 class="mb-1 h2 fw-bold">Sign in to JobHive</h1>
                    <p>Welcome back to JobHive! Enter your email to get started.</p>
                </div>
                <form class="needs-validation">
                    <div class="g-3 row">
                        <div class="col-12 mb-2">
                            <label class="visually-hidden form-label" for="formSigninEmail">Email address</label>
                            <input placeholder="Email" id="formSigninEmail" class="form-control" type="email" name="email" required>
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden form-label" for="formSigninPassword">Password</label>
                            <div class="password-field position-relative">
                                <input placeholder="*****" id="formSigninPassword" class="form-control" type="password" name="signin_password" required>
                                <span class="password-toggle position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                                    <i class="bi bi-eye-slash" id="toggleSigninPasswordIcon"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input id="flexCheckDefault" class="form-check-input" type="checkbox" value="">
                                <label for="flexCheckDefault" class="form-check-label">Remember me</label>
                            </div>
                            <a class="text-decoration-none" style="color: #d49326;" href="/resetpass">Forgot password?</a>
                        </div>
                        <div class="d-grid col-12 ">
                            <x-buttons.goldbutton>Sign In</x-buttons.goldbutton>
                        </div>
                        <div class="text-center">
                            Don’t have an account? <a class="text-decoration-none" style="color: #d49326;" href="/signup">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
