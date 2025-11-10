<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            if (Schema::hasColumn('peminjaman', 'id_denda')) {
                $table->dropForeign(['id_denda']);
            }
        });

        DB::statement('ALTER TABLE peminjaman MODIFY id_denda BIGINT UNSIGNED NULL');

        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_denda')
                ->references('id_denda')
                ->on('denda')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign(['id_denda']);
        });

        DB::statement('ALTER TABLE peminjaman MODIFY id_denda BIGINT UNSIGNED NOT NULL');

        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_denda')
                ->references('id_denda')
                ->on('denda');
        });
    }
};
