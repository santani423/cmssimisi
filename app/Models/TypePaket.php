<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypePaket extends Model
{
    use HasFactory;

    // Mengizinkan semua field untuk mass assignment (hati-hati untuk keamanan)
    protected $guarded = [];

    // protected $with = ['paket' ];
    /**
     * Ambil data paket berdasarkan type_paket_id
     * BUKAN relasi Eloquent, hanya query manual
     */
    public function paket()
    {
        return DB::table('pakets')->where('type_paket_id', $this->id)->get();
    }

       public function jenisPakets()
    {
        return $this->belongsToMany(
            JenisPaket::class,
            'pakets',           // pivot table
            'type_paket_id',    // foreign key di pivot yg mengacu ke type_pakets
            'jenis_paket_id'    // foreign key di pivot yg mengacu ke jenis_pakets
        )->distinct();
    }
}
