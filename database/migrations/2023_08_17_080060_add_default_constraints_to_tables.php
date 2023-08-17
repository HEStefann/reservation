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
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->boolean('Active')->default(1)->change();
        });

        Schema::table('background_types', function (Blueprint $table) {
            $table->boolean('Active')->default(1)->change();
        });

        Schema::table('shape_group_types', function (Blueprint $table) {
            $table->boolean('Active')->default(1)->change();
        });

        Schema::table('shape_types', function (Blueprint $table) {
            $table->boolean('Active')->default(1)->change();
        });

        Schema::table('tables', function (Blueprint $table) {
            $table->boolean('Reserved')->default(0)->change();
            $table->boolean('Lock')->default(0)->change();
            $table->integer('Capacity')->default(4)->change();
        });

        Schema::table('table_size', function (Blueprint $table) {
            $table->boolean('Active')->default(1)->change();
        });

        Schema::table('backgrounds', function (Blueprint $table) {
            $table->foreign('IdType')->references('Id')->on('background_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->dropForeign(['IdType']);
            $table->dropColumn('Active');
        });

        Schema::table('background_types', function (Blueprint $table) {
            $table->dropColumn('Active');
        });

        Schema::table('shape_group_type', function (Blueprint $table) {
            $table->dropColumn('Active');
        });

        Schema::table('tables', function (Blueprint $table) {
            $table->dropColumn(['Reserved', 'Lock', 'Capacity']);
        });

        Schema::table('table_size', function (Blueprint $table) {
            $table->dropColumn('Active');
        });
    }
};
