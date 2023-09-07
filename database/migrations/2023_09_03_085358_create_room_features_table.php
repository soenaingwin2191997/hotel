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
        Schema::create('room_features', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->bigInteger('air_con')->default(0);
            $table->bigInteger('fun')->default(0);
            $table->bigInteger('wifi')->default(0);
            $table->bigInteger('tv')->default(0);
            $table->bigInteger('city_view')->default(0);
            $table->bigInteger('breakfast')->default(0);
            $table->bigInteger('lunch')->default(0);
            $table->bigInteger('bathroom')->default(0);
            $table->bigInteger('toilet')->default(0);
            $table->bigInteger('windows')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_features');
    }
};
