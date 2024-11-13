@extends('layouts.guest')
@include('layouts.header')
@section('content')
    <div class="bg-image" style="background-image: url('{{ asset('assets/img/shanghai2.jpg') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; min-height: 600px; height: 100vh;">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-10 text-center">
                    <h1 class="text-white display-2 fw-bold mb-4">Welcome to Job Hive Local!</h1>
                    <p class="lead text-white fs-1 mb-5">Introducing a new model for online job searching, helping you find available jobs in your local area.</p>
                    <a role="button" class="btn btn-lg rounded-pill text-white px-5 py-3" style="background-color: #947439;" href="/signup">Join Us</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 px-4">
                <x-career_advice />
                
                <div class="text-center text-md-start">
                    <h2>Find your next company</h2>
                    <p>View company profile to find perfect workplace for you. Learn about Jobs, ratings, company info, benefits and more.</p>
                </div>
                
                <x-try />
            </div>
        </div>
    </div>
@endsection
