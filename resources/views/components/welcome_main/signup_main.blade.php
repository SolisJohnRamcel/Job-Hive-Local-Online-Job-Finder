<main>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6 col-12 order-lg-2 offset-lg-1 order-1">
                <div class="mb-lg-9 mb-5">
                    <h1 class="mb-1 h2 fw-bold">Sign Up to JobHive</h1>
                    <p>Welcome to JobHive! Enter your email to get started.</p>
                </div>
                <form class="needs-validation">
                    <div class="g-3 row">
                        <div class="col-12 col-md-6 mb-2">
                            <label class="visually-hidden form-label" for="formSignupfname">First Name</label>
                            <input type="hidden" name="user_id">
                            <input placeholder="First Name" id="formSignupfname" class="form-control" type="text" name="firstName" required>
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="visually-hidden form-label" for="formSignuplname">Last Name</label>
                            <input placeholder="Last Name" id="formSignuplname" class="form-control" type="text" name="lastName" required>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="visually-hidden form-label" for="formSignupEmail">Email address</label>
                            <input placeholder="Email" id="formSignupEmail" class="form-control" type="email" name="email" required>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label" for="formBirthday" style="font-size: 12px; color:gray;">Birthday</label>
                            <input id="formBirthday" class="form-control" type="date" name="birthday" placeholder="MM/DD/YYYY">
                        </div>
                        <div class="col-12 mb-2">
                        <label for="formGender" class="form-label text-muted" style="font-size: 12px;">Gender</label>
                        <select id="formGender" class="form-select" name="gender" required>
                            <option value="" disabled selected>-</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="prefer_not_to_say">Prefer not to say</option>
                        </select>
                        </div>
                        <div class="col-12 mb-2">
                        <label class="form-label" for="formSignupPassword" style="font-size: 12px; color: gray;">Password</label>
                        <div class="password-field position-relative">
                            <input placeholder="*****" id="formSignupPassword" class="form-control" type="password" name="password" required />
                            <span class="password-toggle position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                            <i class="bi bi-eye-slash" id="toggleSignupPasswordIcon"></i>
                            </span>
                        </div>
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label" for="formConfirmSignupPassword" style="font-size: 12px; color:gray;">Confirm Password</label>
                            <div class="password-field position-relative">
                                <input placeholder="*****" id="formConfirmSignupPassword" class="fakePassword form-control" type="password" name="confirm_password" required>
                                <span class="password-toggle position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;">
                                <i class="bi bi-eye-slash" id="toggleConfirmPasswordIcon"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-grid col-12 mb-2">
                            <x-buttons.goldbutton>Register</x-buttons.goldbutton>
                        </div>
                    </div>
                    <p class="text-center">
                        <small>By continuing, you agree to our <a class="text-decoration-none" style="color: #d49326;" href="#!">Terms of Service</a> &amp; <a class="text-decoration-none" style="color: #d49326;" href="#!">Privacy Policy</a></small>
                    </p>
                </form>
            </div>
        </div>
    </div>
</main>

