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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('full_name', 100)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->decimal('deposit', 8, 2)->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
