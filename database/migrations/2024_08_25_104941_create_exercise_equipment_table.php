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
        Schema::create('exercise_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->references('id')->on('exercises')->constrained()->onDelete('cascade');
            $table->foreignId('equipment_id')->references('id')->on('equipments')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_equipment');
    }
};
