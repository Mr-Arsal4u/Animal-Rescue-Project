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
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('breed');
            $table->text('story');
            $table->string('timeline');
            $table->string('location');
            $table->string('adopted_by');
            $table->date('adoption_date');
            $table->json('stats')->nullable();
            $table->string('before_image')->nullable();
            $table->string('after_image')->nullable();
            $table->boolean('featured')->default(false);
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('success_stories');
    }
};
