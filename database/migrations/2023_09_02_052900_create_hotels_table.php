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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('township_id');
            $table->string('hotel_name');
            $table->string('hotel_photo');
            $table->text('hotel_desc');
            $table->string('hotel_phone');
            $table->string('hotel_email');
            $table->text('hotel_address')->nullable();
            $table->string('hotel_map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
