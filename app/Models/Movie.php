<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'genre_id',
        'rating',
        'year',
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}