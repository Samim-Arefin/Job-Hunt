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
               $table->text('job_category_heading')->after('background');
               $table->text('job_category_subheading')->nullable()->after('job_category_heading');
               $table->text('job_category_status')->after('job_category_subheading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->dropColumn('job_category_heading');
            $table->dropColumn('job_category_subheading');
            $table->dropColumn('job_category_status');
        });
    }
};
