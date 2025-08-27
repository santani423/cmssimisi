<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisPaket extends Model
{
    use HasFactory;

    public function typePakets()
    {
        return $this->belongsToMany(
            TypePaket::class,
            'pakets',             // tabel pivot
            'jenis_paket_id',     // FK di pivot ke jenis_pakets
            'type_paket_id'       // FK di pivot ke type_pakets
        )->distinct();
    }
}