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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->decimal('rating', 2, 1)->nullable();
            $table->text('description')->nullable();
            $table->enum('review_type', ['restaurant', 'reservation']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
