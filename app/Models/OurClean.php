<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClean extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'img', 'company', 'contact_person', 'email', 'phone',
        'address', 'is_active', 'notes','kategori_our_clien_id'
    ];
}
