<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama'
    ];


    // protected $with = ['subBangunan'];
    public function subBangunan()
    {
        return $this->hasMany(SubBangunan::class);
    }
    
}
