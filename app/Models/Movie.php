<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'genre', 'rating', 'year', 'is_showing'];

    protected function casts(): array
    {
        return [
            'is_showing' => 'boolean',   // your boolean column
            'year'       => 'integer',   // your integer column
        ];
    }
}