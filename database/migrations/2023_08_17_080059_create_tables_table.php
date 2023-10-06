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
            $table->string('ModifiedBy', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('Height');
            $table->integer('Width');
            $table->unsignedBigInteger('IdBillPrinter')->nullable();
            $table->string('TemporaryName', 50)->nullable();
            $table->datetime('BlockTime')->nullable();
            $table->boolean('Reserved')->default(0);
            $table->boolean('Lock')->default(0);
            $table->integer('Capacity')->default(4);
            $table->integer('RotationSide')->nullable();
            $table->integer('InteriorShapeType')->nullable();
            $table->integer('Sits')->nullable();

            $table->unsignedBigInteger('IdTableSize')->nullable();
            $table->foreign('IdFloor')->references('id')->on('floors');
            $table->foreign('IdTableSize')->references('id')->on('table_size');
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
