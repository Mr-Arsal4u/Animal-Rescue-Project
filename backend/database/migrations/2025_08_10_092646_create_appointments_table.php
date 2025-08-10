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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('pet_breed');
            $table->integer('pet_age');
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_phone');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('service_type');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->text('symptoms')->nullable();
            $table->integer('urgency_level')->default(1); // 1-5 scale
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->decimal('total_cost', 8, 2)->default(0);
            $table->enum('payment_status', ['pending', 'paid', 'partial'])->default('pending');
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
