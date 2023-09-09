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
        Schema::create('hotel_features', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');
            $table->boolean('pool')->default(0);
            $table->boolean('spa')->default(0);
            $table->boolean('gyn')->default(0);
            $table->boolean('city_view')->default(0);
            $table->boolean('bar')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean('car_parking')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('restaurant')->default(0);
            $table->boolean('air_con')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_features');
    }
};
