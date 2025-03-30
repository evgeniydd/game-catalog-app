<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{   
    use HasFactory;
    protected $fillable = [
        'title', 'developer', 'genre', 'release_date', 'platform', 'price', 'cover_image'
    ];

    protected $dates = ['release_date'];
}