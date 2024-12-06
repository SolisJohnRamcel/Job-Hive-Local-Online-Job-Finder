<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('job_id')->constrained('joblist')->onDelete('cascade'); // Foreign key to joblist table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('status')->nullable();; // Status with a default value
            $table->string('first_name'); // First name field
            $table->string('last_name'); // Last name field
            $table->string('email'); // Email field
            $table->string('phone_number'); // Phone number field
            $table->string('applied_position'); // Applied position field
            $table->date('start_date'); // Earliest possible start date field
            $table->date('interview_date')->nullable(); // Preferred interview date (nullable)
            $table->string('time_slot')->nullable(); // Time slot for interview (nullable)
            $table->string('resume')->nullable(); // File path for the uploaded resume
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application');
    }
};
