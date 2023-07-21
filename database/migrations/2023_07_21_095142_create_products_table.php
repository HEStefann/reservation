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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->string('name', 100);
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};