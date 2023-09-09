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
        Schema::create('table_size', function (Blueprint $table) {
            $table->id();
            $table->string('Description', 20);
            $table->unsignedBigInteger('ShapeGroupTypeId')->nullable();
            $table->unsignedBigInteger('IdResolutionType')->nullable();
            $table->integer('Height');
            $table->integer('Width');
            $table->boolean('Active')->default(1);
            $table->string('CreatedBy', 100);
            $table->string('ModifiedBy', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ShapeGroupTypeId')->references('id')->on('shape_group_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_size');
    }
};
