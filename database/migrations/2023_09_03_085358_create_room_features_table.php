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
            $table->boolean('air_con')->default(0);
            $table->boolean('fun')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('tv')->default(0);
            $table->boolean('city_view')->default(0);
            $table->boolean('breakfast')->default(0);
            $table->boolean('lunch')->default(0);
            $table->boolean('bathroom')->default(0);
            $table->boolean('toilet')->default(0);
            $table->boolean('window')->default(0);
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
