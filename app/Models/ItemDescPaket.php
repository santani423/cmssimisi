<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDescPaket extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['itemDesc'];
    
    public function itemDesc()  
    {
        return $this->belongsTo(ItemDesc::class, 'item_desc_id', 'id');
    }
}
