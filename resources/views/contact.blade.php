<!-- resources/views/contact.blade.php -->
@extends('layouts.guest')
@include('layouts.header2')

@section('content')
    <!-- Background Image Section with Card -->
<section class="min-vh-100 d-flex align-items-center" style="background: url('assets/img/shanghai2.jpg') center/cover fixed;">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 overflow-hidden shadow-lg">
                    <div class="row g-0">
                        <!-- Left Side - Contact Form -->
                        <div class="col-lg-8 bg-white p-5">
                            <h2 class="text-center fw-bold mb-2">Contact Us</h2>
                            <p class="text-center text-muted mb-5">Have questions or need assistance? Reach out to us below.</p>

                            <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    placeholder="Enter your full name" 
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input 
                                    type="email" 
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    placeholder="Enter your email" 
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input 
                                    type="tel" 
                                    class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                    id="phone" 
                                    name="phone" 
                                    placeholder="Enter your phone number" 
                                    value="{{ old('phone') }}"
                                >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label fw-semibold">Message</label>
                                <textarea 
                                    class="form-control form-control-lg @error('message') is-invalid @enderror" 
                                    id="message" 
                                    name="message" 
                                    rows="4" 
                                    placeholder="Write your message here"
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn text-white btn-lg w-100" style="background-color: #947439;">Send Message</button>
                        </form>


                            <div id="successMessage" class="alert alert-success mt-4 d-none">
                                Thank you for contacting us! We will get back to you soon.
                            </div>
                        </div>

                        <!-- Right Side - Hero Section -->
                        <div class="col-lg-4 d-flex align-items-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/img/Job Hive_icon.png') center/cover;">
                            <div class="p-5 text-center">
                                <h1 class="display-4 fw-bold">Get In Touch</h1>
                                <p class="lead">We're here to help you succeed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
