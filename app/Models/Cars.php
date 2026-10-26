<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = [
        'nama',
        'brand',
        'harga',
        'tahun',
        'transmisi',
        'bahan_bakar',
        'status',
        'foto',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'integer',
            'tahun' => 'integer',
        ];
    }
}
