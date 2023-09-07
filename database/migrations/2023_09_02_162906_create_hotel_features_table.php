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
            $table->bigInteger('pool')->default(0);
            $table->bigInteger('spa')->default(0);
            $table->bigInteger('gyn')->default(0);
            $table->bigInteger('city_view')->default(0);
            $table->bigInteger('bar')->default(0);
            $table->bigInteger('elevator')->default(0);
            $table->bigInteger('car_parking')->default(0);
            $table->bigInteger('wifi')->default(0);
            $table->bigInteger('restaurant')->default(0);
            $table->bigInteger('air_con')->default(0);
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
