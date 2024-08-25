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
        Schema::create('gym_tracker_body_part_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('body_part_id');
            $table->string('locale');
            $table->string('title');
            $table->timestamps();

            $table->foreign('body_part_id')->references('id')->on('gym_tracker_body_parts')->onDelete('cascade');
            $table->unique(['body_part_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_tracker_bodypart_translations');
    }
};
