<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPinjam
 *
 * @property $id_pinjam
 * @property $id_buku
 * @property $tgl_kembali
 *
 * @property Buku $buku
 * @property Peminjaman $peminjaman
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailPinjam extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_pinjam', 'id_buku', 'tgl_kembali'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buku()
    {
        return $this->belongsTo(\App\Models\Buku::class, 'id_buku', 'id_buku');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function peminjaman()
    {
        return $this->belongsTo(\App\Models\Peminjaman::class, 'id_pinjam', 'id_pinjam');
    }
    
}
