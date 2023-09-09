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
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->string('Description', 50);
            $table->integer('DisplayOrder');
            $table->boolean('Active');
            $table->string('CreatedBy', 100);
            $table->string('ModifiedBy', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->text('LineElements')->nullable();
            $table->string('PrinterName', 50)->nullable();
            $table->unsignedBigInteger('IdBackground')->nullable();
            $table->string('Colour', 10)->nullable();

            $table->foreign('IdBackground')->references('id')->on('backgrounds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floors');
    }
};
