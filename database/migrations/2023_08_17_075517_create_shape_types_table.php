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
        Schema::create('shape_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IdShapeGroup');
            $table->string('Description', 50)->nullable();
            $table->boolean('Active')->default(1);
            $table->string('CreatedBy', 100);
            $table->string('ModifiedBy', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('IdShapeGroup')->references('id')->on('shape_group_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shape_types');
    }
};
