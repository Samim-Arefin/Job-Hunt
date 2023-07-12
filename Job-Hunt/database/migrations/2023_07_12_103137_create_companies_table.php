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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('token')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('founded_on')->nullable();
            $table->unsignedBigInteger('company_location_id')->nullable();
            $table->unsignedBigInteger('company_size_id')->nullable();
            $table->unsignedBigInteger('company_industry_id')->nullable();
            $table->text('description')->nullable();
            $table->string('mon')->nullable();
            $table->string('tue')->nullable();
            $table->string('wed')->nullable();
            $table->string('thu')->nullable();
            $table->string('fri')->nullable();
            $table->text('map_code')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->foreign('company_location_id')->references('id')->on('company_locations')->onDelete('cascade');
            $table->foreign('company_size_id')->references('id')->on('company_sizes')->onDelete('cascade');
            $table->foreign('company_industry_id')->references('id')->on('company_industries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
