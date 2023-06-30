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
               $table->text('why_choose_heading')->after('job_category_status');
               $table->text('why_choose_subheading')->nullable()->after('why_choose_heading');
               $table->text('why_choose_background')->nullable()->after('why_choose_subheading');
               $table->text('why_choose_status')->after('why_choose_background');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home_items', function (Blueprint $table) {
             $table->dropColumn('why_choose_heading');
             $table->dropColumn('why_choose_subheading');
             $table->dropColumn('why_choose_background');
             $table->dropColumn('why_choose_status');
        });
    }
};
