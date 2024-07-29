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
        Schema::dropIfExists(('exercise_muscle'));
        Schema::create('exercise_muscle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained();
            $table->foreignId('muscle_id')->contrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_muscle');
    }
};
