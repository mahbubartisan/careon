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
        Schema::create('ambulance_supports', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            // Patient info
            $table->string('patient_name');
            $table->unsignedTinyInteger('patient_age');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('medical_condition')->nullable();

            // Contact
            $table->string('contact_person');
            $table->string('phone');

            // Location
            $table->text('pickup_address');
            $table->text('destination_address');

            // Ambulance
            $table->string('ambulance_type');
            $table->string('booking_type'); // Emergency | Scheduled
            $table->dateTime('pickup_datetime');

            // Notes
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulance_requests');
    }
};
