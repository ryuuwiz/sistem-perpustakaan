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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->year('tahun');
            $table->string('isbn');
            $table->date('tgl_input');
            $table->integer('jml_halaman');
            $table->foreignId('id_kategori')->constrained('kategori_buku', 'id_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
