<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'pokedex_number',
        'pokedex_description',
        'stats',
        'type',
        'image_url',
    ];

    public function getStatsAttribute($value)
    {
        return json_decode($value, true);
    }
}
