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
        Schema::table('joblist', function (Blueprint $table) {
            $table->unsignedBigInteger('company_profile_id')->nullable();

            // Add the foreign key constraint
            $table->foreign('company_profile_id')->references('id')->on('company_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('joblist', function (Blueprint $table) {
            $table->dropForeign(['company_profile_id']);
            $table->dropColumn('company_profile_id');
        });
    }
};
