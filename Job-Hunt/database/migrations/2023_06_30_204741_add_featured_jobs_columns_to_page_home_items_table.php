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
            $table->text('featured_jobs_heading')->after('why_choose_status');
            $table->text('featured_jobs_subheading')->nullable()->after('featured_jobs_heading');
            $table->text('featured_jobs_status')->after('featured_jobs_subheading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
             $table->dropColumn('featured_jobs_heading');
             $table->dropColumn('featured_jobs_subheading');
             $table->dropColumn('featured_jobs_status');
        });
    }
};
