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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->date('tgl_pinjam');
            $table->integer('lama_pinjam');
            $table->foreignId('id_anggota')->constrained('anggota', 'id_anggota');
            $table->foreignId('id_denda')->constrained('denda', 'id_denda');
            $table->foreignId('id')->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
