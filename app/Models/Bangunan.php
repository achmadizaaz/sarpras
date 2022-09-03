<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'kode', 'slug', 'nama'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['nama']
            ]
        ];
    }

    public function subBangunan()
    {
        return $this->hasMany(SubBangunan::class);
    }
    
}
