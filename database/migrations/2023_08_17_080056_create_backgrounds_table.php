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
            $table->string('Title', 50);
            $table->text('Data');
            $table->string('ObjectColour', 10);
            $table->string('SymbolColour', 10);
            $table->unsignedBigInteger('IdType');
            // $table->unsignedInteger('IdResolutionType');
            $table->boolean('Active')->default(1);
            $table->string('CreatedBy', 100);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('IdType')->references('id')->on('background_types');
            // $table->foreign('IdResolutionType')->references('id')->on('background_resolution_types');
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
