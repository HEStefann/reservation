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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->integer('average_price')->nullable();
            $table->integer('recomended')->nullable();
            $table->integer('floors_number')->nullable();
            $table->boolean('approved')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('reservation_lasting_time')->default(1)->nullable();    
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
