<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('nrc')->nullable();
            $table->string('passport')->nullable();
            $table->date('bitrhday')->nullable();
            $table->integer('hotel_id');
            $table->integer('room_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};