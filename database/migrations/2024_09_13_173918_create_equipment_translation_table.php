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
        Schema::create('gym_tracker_equipment_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id');
            $table->string('locale');
            $table->string('title');
            $table->timestamps();

            $table->foreign('equipment_id')->references('id')->on('gym_tracker_equipments')->onDelete('cascade');
            $table->unique(['equipment_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_translation');
    }
};
