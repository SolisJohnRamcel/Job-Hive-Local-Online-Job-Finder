<main>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6 col-12 order-lg-2 offset-lg-1 order-1">
                <div class="mb-5">
                    <h1 class="mb-1 h2 fw-bold">Forgot your password?</h1>
                    <p>Please enter the email address associated with your account and we will email you a link to reset your password.</p>
                </div>
                <form class="needs-validation">
                    <div class="g-3 row">
                        <div class="col-12 mb-3">
                            <label class="visually-hidden form-label" for="formForgetEmail">Email address</label>
                            <input placeholder="Email" id="formForgetEmail" class="form-control" type="email" name="email" required>
                        </div>
                        <div class="d-grid gap-2 col-12 mb-3">
                            <x-buttons.goldbutton>Reset Password</x-buttons.goldbutton>
                            <a role="button" tabindex="0" class="btn btn-dark" href="/signin">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
