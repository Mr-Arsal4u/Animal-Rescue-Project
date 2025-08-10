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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->string('dosage_form');
            $table->string('strength');
            $table->string('manufacturer');
            $table->decimal('price', 8, 2);
            $table->integer('stock_quantity')->default(0);
            $table->date('expiry_date');
            $table->boolean('prescription_required')->default(false);
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive', 'discontinued'])->default('active');
            $table->text('side_effects')->nullable();
            $table->text('contraindications')->nullable();
            $table->string('storage_conditions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
