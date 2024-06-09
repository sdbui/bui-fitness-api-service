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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('target_muscle_group');
            $table->string('exercise_type');
            $table->string('equipment_required');
            $table->string('mechanics');
            $table->string('force_type');
            $table->string('experience_level');
            $table->string('secondary_muscles');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
