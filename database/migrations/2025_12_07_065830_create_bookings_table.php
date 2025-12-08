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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            // $table->string('cutomer_name')->nullable();

            // Snapshot Data
            $table->string('service_name');
            $table->string('package_name')->nullable();
            $table->string('care_level_name')->nullable();
            $table->string('hours')->nullable();

            // Prices
            $table->string('price')->nullable();
            $table->string('location_group')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_price')->nullable();
            $table->string('total_price')->nullable();

            // Schedule
            $table->date('schedule_date')->nullable();
            $table->string('schedule_time')->nullable();

            // Payment
            $table->string('payment_method')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
