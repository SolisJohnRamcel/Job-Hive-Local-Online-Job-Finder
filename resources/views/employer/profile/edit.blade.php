@extends('employer.employer')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @include('employer.profile.partials.update-password-form')
        @include('employer.profile.partials.delete-user-form')
    </div>
</div>
@endsection
