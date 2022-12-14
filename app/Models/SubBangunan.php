<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBangunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bangunan_id', 'kode', 'nama'
    ];

    protected $with = ['bangunan'];

    public function bangunan()
    {
        return $this->belongsTo(Bangunan::class);
    }

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class);
    }
}
