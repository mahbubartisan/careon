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
        Schema::create('care_providers', function (Blueprint $table) {
            $table->id();
            /** =====================
             * Personal Information
             * ===================== */
            $table->string('full_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('nid_number')->unique();

            $table->text('present_address');
            $table->text('permanent_address');

            /** =====================
             * Professional Info
             * ===================== */
            $table->string('service_category');
            $table->string('experience');
            $table->string('qualification');
            $table->enum('qualification_status', ['Completed', 'Running']);

            /** =====================
             * Availability & Language
             * ===================== */
            $table->json('languages');
            $table->string('availability');

            /** =====================
             * Media References
             * ===================== */
            $table->json('nid_ids');            // [1,2]
            $table->foreignId('license_id')->nullable();
            $table->foreignId('training_id')->nullable();
            $table->foreignId('police_id')->nullable();

            /** =====================
             * Agreement
             * ===================== */
            $table->boolean('agree');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('care_providers');
    }
};
