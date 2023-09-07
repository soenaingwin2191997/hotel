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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->integer('room_number');
            $table->string('room_photo');
            $table->integer('room_price');
            $table->integer('room_bad');
            $table->integer('room_person');
            $table->integer('room_floor');
            $table->integer('room_status')->default(1);
            $table->integer('room_type')->default(1);
            $table->text('room_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
