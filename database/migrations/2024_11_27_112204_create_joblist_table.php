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
        Schema::create('joblist', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Job title
            $table->string('company_name'); // Company name
            $table->string('location'); // Job location
            $table->integer('salary_min')->nullable(); // Minimum salary
            $table->integer('salary_max')->nullable(); // Maximum salary
            $table->string('job_category'); // Job category
            $table->string('job_img')->nullable(); // Job thumbnail or logo
            $table->string('job_cover_photo')->nullable(); // Cover photo for the job
            $table->text('additional_info')->nullable(); // Additional information about the job
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joblist');
    }
};
