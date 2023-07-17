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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->text('title');
            $table->text('description');
            $table->text('responsibility')->nullable();
            $table->text('skill')->nullable();
            $table->text('education')->nullable();
            $table->text('benefit')->nullable();
            $table->text('deadline');
            $table->integer('vacancy');
            $table->unsignedBigInteger('job_category_id')->nullable();
            $table->unsignedBigInteger('job_location_id')->nullable();
            $table->unsignedBigInteger('job_type_id')->nullable();
            $table->unsignedBigInteger('job_experience_id')->nullable();
            $table->unsignedBigInteger('job_gender_id')->nullable();
            $table->unsignedBigInteger('job_salary_range_id')->nullable();
            $table->text('map_code')->nullable();
            $table->tinyInteger('is_featured');
            $table->tinyInteger('is_urgent');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('job_location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types');
            $table->foreign('job_experience_id')->references('id')->on('job_experiences');
            $table->foreign('job_gender_id')->references('id')->on('job_genders');
            $table->foreign('job_salary_range_id')->references('id')->on('job_salary_ranges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
