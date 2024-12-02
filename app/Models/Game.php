<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cover_url', 'description', 'release_date', 'genres', 'platforms', 'rating'
    ];

    // Se vuoi lavorare con i dati JSON per 'genres' e 'platforms', assicurati che siano castati correttamente
    protected $casts = [
        'genres' => 'array',
        'platforms' => 'array',
    ];
}
