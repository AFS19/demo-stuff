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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Patient
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade'); // Doctor
            $table->foreignId('speciality_id')->constrained('specialities')->onDelete('cascade'); // Specialty
            $table->text('diagnosis');
            $table->text('treatment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
