@extends('admin.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @include('admin.profile.partials.update-profile-information-form')
        @include('admin.profile.partials.update-password-form')
        @include('admin.profile.partials.delete-user-form')
    </div>
</div>
@endsection
