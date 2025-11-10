<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Peminjaman
 *
 * @property int $id_pinjam
 * @property string $tgl_pinjam
 * @property int $lama_pinjam
 * @property int $id_anggota
 * @property int $id_denda
 * @property int $id
 *
 * @property \App\Models\Anggota $anggota
 * @property \App\Models\Denda $denda
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetailPinjam> $detailPinjam
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_pinjam';
    public $timestamps = false;
    protected $perPage = 10;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'tgl_pinjam',
        'lama_pinjam',
        'id_anggota',
        'id_denda',
        'id',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'tgl_pinjam' => 'date',
        'lama_pinjam' => 'integer',
        'id_anggota' => 'integer',
        'id_denda' => 'integer',
        'id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'id_anggota', 'id_anggota');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function denda()
    {
        return $this->belongsTo(\App\Models\Denda::class, 'id_denda', 'id_denda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPinjam()
    {
        return $this->hasMany(\App\Models\DetailPinjam::class, 'id_pinjam', 'id_pinjam');
    }
}
