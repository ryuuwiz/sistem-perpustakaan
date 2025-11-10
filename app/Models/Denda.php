<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Denda
 *
 * @property int $id_denda
 * @property string $nominal
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Peminjaman> $peminjaman
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Denda extends Model
{
    protected $table = 'denda';
    protected $primaryKey = 'id_denda';
    public $timestamps = false;
    protected $perPage = 10;

    /**
     * @var array<int, string>
     */
    protected $fillable = ['nominal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peminjaman()
    {
        return $this->hasMany(\App\Models\Peminjaman::class, 'id_denda', 'id_denda');
    }
}
