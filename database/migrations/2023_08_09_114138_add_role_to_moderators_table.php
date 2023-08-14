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
        Schema::table('moderators', function (Blueprint $table) {
            $table->enum('role', ['moderator', 'owner'])
                ->after('user_id')
                ->default('moderator');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moderators', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
