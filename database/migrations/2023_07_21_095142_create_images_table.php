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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->boolean('first_image');
            $table->unsignedBigInteger('restaurant_id')->nullable();;
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('image_url', 255);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('images');
    }
};
