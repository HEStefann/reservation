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
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('Title', 50)->nullable();
            $table->string('Data', 250);
            $table->string('ObjectColour', 10)->nullable();
            $table->string('SymbolColour', 10)->nullable();
            $table->unsignedBigInteger('IdType');
            $table->unsignedBigInteger('IdResolutionType')->nullable();
            $table->boolean('Active');
            $table->string('CreatedBy', 100);
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('IdType')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backgrounds');
    }
};
