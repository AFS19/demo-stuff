<?php

use App\Enums\AppointmentMethodEnum;
use App\Enums\AppointmentStatusEnum;
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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Patient
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade'); // Doctor
            $table->foreignId('speciality_id')->constrained('specialities')->onDelete('cascade'); // Specialty
            $table->string('status')->default(AppointmentStatusEnum::PENDING);
            $table->dateTime('date_time');
            $table->string('method')->default(AppointmentMethodEnum::IN_PERSONAL);
            $table->string('payment_status')->default(\App\Enums\AppointmentPaymentStatusEnum::class::PENDING);
            $table->string('google_event_id')->nullable(); // For Google Calendar integration
            $table->string('zoom_meeting_link')->nullable(); // For Zoom integration
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
