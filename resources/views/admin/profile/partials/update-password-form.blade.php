<section class="container-fluid">
    <header class="mb-4">
        <h2 class="h4 mb-2">{{ __('Update Password') }}</h2>
        <p class="text-muted small">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="needs-validation">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input type="password" 
                   class="form-control" 
                   id="update_password_current_password" 
                   name="current_password" 
                   autocomplete="current-password">
            @foreach ($errors->updatePassword->get('current_password') as $error)
                <div class="text-danger small mt-1">{{ $error }}</div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input type="password" 
                   class="form-control" 
                   id="update_password_password" 
                   name="password" 
                   autocomplete="new-password">
            @foreach ($errors->updatePassword->get('password') as $error)
                <div class="text-danger small mt-1">{{ $error }}</div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" 
                   class="form-control" 
                   id="update_password_password_confirmation" 
                   name="password_confirmation" 
                   autocomplete="new-password">
            @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                <div class="text-danger small mt-1">{{ $error }}</div>
            @endforeach
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
            @if (session('status') === 'password-updated')
                <div class="text-success small">{{ __('Saved.') }}</div>
            @endif
        </div>
    </form>
</section>

<br>