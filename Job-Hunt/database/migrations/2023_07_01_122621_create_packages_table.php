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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->smallInteger('price');
            $table->smallInteger('days');
            $table->string('time', 100);
            $table->tinyInteger('total_allowed_jobs');
            $table->tinyInteger('total_allowed_featured_jobs');
            $table->tinyInteger('total_allowed_photos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
