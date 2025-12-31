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
        Schema::create('doctor_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('patient_name');
            $table->unsignedTinyInteger('patient_age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone');
            $table->string('email');
            $table->string('doctor_type');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->text('problem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_consultations');
    }
};
