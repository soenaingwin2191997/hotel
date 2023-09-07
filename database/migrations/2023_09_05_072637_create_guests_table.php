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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->integer('room_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('nrc')->nullable();
            $table->string('passport')->nullable();
            $table->date('birthday')->nullable();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guest_value')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
