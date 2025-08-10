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
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained()->onDelete('cascade');
            $table->string('adopter_name');
            $table->string('adopter_email');
            $table->string('adopter_phone');
            $table->text('adopter_address');
            $table->integer('adopter_age');
            $table->string('adopter_occupation');
            $table->boolean('adopter_experience')->default(false);
            $table->integer('adopter_family_size');
            $table->string('adopter_housing_type');
            $table->text('adopter_other_pets')->nullable();
            $table->text('adopter_reason');
            $table->text('adopter_commitment');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->text('notes')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('approved_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_requests');
    }
};
