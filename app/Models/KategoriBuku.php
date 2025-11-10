<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriBuku
 *
 * @property $id_kategori
 * @property $kategori
 *
 * @property Buku[] $bukus
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class KategoriBuku extends Model
{

    protected $perPage = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['kategori'];
    protected $table = 'kategori_buku';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buku()
    {
        return $this->hasMany(\App\Models\Buku::class, 'id_kategori', 'id_kategori');
    }
}
