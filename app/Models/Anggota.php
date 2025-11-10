<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Anggota
 *
 * @property $id_anggota
 * @property $nama
 * @property $alamat
 * @property $no_hp
 * @property $email
 * @property $tgl_lahir
 * @property $tgl_daftar
 *
 * @property Peminjaman[] $peminjamen
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anggota extends Model
{

    protected $perPage = 5;

    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama', 'alamat', 'no_hp', 'email', 'tgl_lahir', 'tgl_daftar'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function peminjaman()
    // {
    //     return $this->hasMany(\App\Models\Peminjaman::class, 'id_anggota', 'id_anggota');
    // }
}
