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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('oder_no');
            $table->integer('amount');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('package_id');
            $table->string('transaction_id');
            $table->string('currency')->nullable();
            $table->string('starting_date');
            $table->string('ending_date');
            $table->tinyInteger('currently_active');
            $table->string('status');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
