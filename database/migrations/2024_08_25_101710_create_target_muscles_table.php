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
        Schema::create('gym_tracker_target_muscles', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // path
            $table->timestamps();
        });

        Schema::create('gym_tracker_exercise_muscle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gym_tracker_exercise_id')->constrained()->onDelete('cascade');
            $table->foreignId('gym_tracker_target_muscle_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_tracker_target_muscles');
        Schema::dropIfExists('gym_tracker_exercise_muscle');
    }
};
