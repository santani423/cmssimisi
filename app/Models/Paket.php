<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['wilayah', 'itemDescPaket','typePaket'];

    /**
     * Relasi ke model Wilayah.
     */
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'id');
    }

    public function itemDescPaket()
    {
        return $this->hasMany(ItemDescPaket::class, 'paket_id', 'id');
    }

    public function typePaket()
    {
        return $this->belongsTo(TypePaket::class, 'type_paket_id', 'id');
    }
}
