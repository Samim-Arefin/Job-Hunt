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
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->text('testimonial_background')->after('featured_jobs_status');
            $table->text('testimonial_status')->after('testimonial_background');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
             $table->dropColumn('testimonial_background');
             $table->dropColumn('testimonial_status');
        });
    }
};
