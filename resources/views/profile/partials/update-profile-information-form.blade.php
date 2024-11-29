<section>
    <header class="mb-3">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit my profile') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="card border-0 shadow-sm">
            <div class="position-relative">
                <!-- Cover Image -->
                <img src="{{ $user->cover_photo ? asset('storage/' . $user->cover_photo) : asset('assets/img/default-image.jpg') }}" class="card-img-top" alt="Cover_Photo" style="height: 250px; object-fit: cover;">
                
                <!-- Edit Button -->
                <div class="position-absolute top-0 end-0 m-3">
                    <label for="cover_photo">
                        <span class="btn btn-dark btn-sm rounded-circle">
                        <i class="bi bi-camera"></i>
                        </span>
                    </label>
                    <input type="file" class="d-none" id="cover_photo" name="cover_photo" accept="image/*" onchange="previewImage(this)" >
                </div>
            </div>
        </div>
        <div class="translate-middle-y position-relative" style="top: 10px; left: 15px;">
            <div class="d-flex align-items-start">
                <div class="position-relative">
                    <div class="bg-white rounded-circle p-1">
                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/img/Job Hive_icon.png') }}" alt="Profile Picture" width="120" height="120" class="rounded-circle border" style="object-fit: cover;">
                        <label for="profile_image" class="position-absolute bottom-0 end-0 mb-1 me-1">
                            <span class="btn btn-sm btn-dark rounded-circle">
                                <i class="bi bi-pencil-fill"></i>
                            </span>
                        </label>
                        <input type="file" class="d-none" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(this)" >
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" >
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jobrole" class="form-label">{{ __('Job Position') }}</label>
            <input type="text" class="form-control" id="jobrole" name="jobrole" value="{{ old('jobrole', $user->jobrole) }}" >
            @error('jobrole')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">{{ __('Description') }}</label>
            <textarea class="form-control" rows="4" id="bio" name="bio" >{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-dark ms-3">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div class="text-success small">{{ __('Saved.') }}</div>
            @endif
        </div>

    </form>
</section>
<br>