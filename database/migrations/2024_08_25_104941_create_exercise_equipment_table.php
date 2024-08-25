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
        // Связующая таблица для упражнений и оборудования
        Schema::create('gym_tracker_exercise_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->references('id')->on('gym_tracker_exercises')->constrained()->onDelete('cascade');
            $table->foreignId('equipment_id')->references('id')->on('gym_tracker_equipments')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_tracker_exercise_equipment');
    }
};
