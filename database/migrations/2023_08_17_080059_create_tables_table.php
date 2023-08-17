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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IdFloor');
            $table->string('TableShortDescription', 5);
            $table->string('TableDescription', 50);
            $table->integer('PositionLeft');
            $table->integer('PositionTop');
            $table->integer('Shape');
            $table->boolean('Active');
            $table->string('CreatedBy', 100);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('Height');
            $table->integer('Width');
            $table->unsignedBigInteger('IdBillPrinter')->nullable();
            $table->string('TemporaryName', 50)->nullable();
            $table->datetime('BlockTime')->nullable();
            $table->boolean('Reserved');
            $table->boolean('Lock');
            $table->integer('Capacity');
            $table->unsignedBigInteger('InteriorShapeType')->nullable();
            $table->unsignedBigInteger('IdTableSize')->nullable();
            $table->unsignedBigInteger('IdRotationSide')->nullable();

            $table->foreign('IdFloor')->references('id')->on('floors');
            // $table->foreign('IdBillPrinter')->references('id')->on('bill_printers');
            // $table->foreign('InteriorShapeType')->references('id')->on('interior_shape_types');
            $table->foreign('IdTableSize')->references('id')->on('table_size');
            // $table->foreign('IdRotationSide')->references('id')->on('rotation_sides');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
