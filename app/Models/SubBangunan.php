<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBangunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bangunan_id', 'kode', 'nama'
    ];

    public function bangunan()
    {
        return $this->belongsTo(Bangunan::class);
    }
}
