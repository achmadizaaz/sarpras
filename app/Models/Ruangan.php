<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama','sub_bangunan_id'
    ];

    public function sub_bangunan()
    {
        return $this->belongsTo(SubBangunan::class);
    }
}
