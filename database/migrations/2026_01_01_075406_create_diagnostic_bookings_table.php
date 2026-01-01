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
        Schema::create('diagnostic_bookings', function (Blueprint $table) {
            $table->id();
            // Booking
            $table->string('booking_id')->unique();
            $table->foreignId('user_id')->nullable();

            // Patient info
            $table->string('patient_name');
            $table->unsignedTinyInteger('patient_age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone');
            $table->string('email');
            $table->string('address');

            // Diagnostic
            $table->string('lab')->nullable();
            $table->json('tests'); //  multiple test IDs
            $table->decimal('total_price', 10, 2)->default(0);

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
        Schema::dropIfExists('diagnostic_bookings');
    }
};
