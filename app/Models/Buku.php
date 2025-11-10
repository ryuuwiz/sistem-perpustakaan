<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buku
 *
 * @property $id_buku
 * @property $judul
 * @property $pengarang
 * @property $penerbit
 * @property $tahun
 * @property $isbn
 * @property $tgl_input
 * @property $jml_halaman
 * @property $id_kategori
 *
 * @property KategoriBuku $kategoriBuku
 * @property DetailPinjam[] $detailPinjams
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Buku extends Model
{

    protected $perPage = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun', 'isbn', 'tgl_input', 'jml_halaman', 'id_kategori'];

    protected $primaryKey = 'id_buku';
    protected $table = 'buku';
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategoriBuku()
    {
        return $this->belongsTo(\App\Models\KategoriBuku::class, 'id_kategori', 'id_kategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPinjam()
    {
        return $this->hasMany(\App\Models\DetailPinjam::class, 'id_buku', 'id_buku');
    }
}
