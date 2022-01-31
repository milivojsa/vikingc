<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelGuide extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'hotels' => 'array',
        'weather' => 'array',
        'covid_stats' => 'array',
    ];
}
