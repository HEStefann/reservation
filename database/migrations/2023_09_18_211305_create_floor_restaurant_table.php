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
        Schema::create('floor_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('restaurant_id'); 
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floor_restaurant');
    }
};
