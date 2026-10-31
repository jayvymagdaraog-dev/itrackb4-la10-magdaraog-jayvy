<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create genres first
        $comedy = Genre::create([
            'name' => 'Comedy'
        ]);

        $romance = Genre::create([
            'name' => 'Romance'
        ]);

        $historical = Genre::create([
            'name' => 'Historical'
        ]);

        // Create movies
        Movie::create([
            'title' => 'Rewind',
            'genre_id' => $romance->id,
            'rating' => 8.0,
            'year' => 2023,
        ]);

        Movie::create([
            'title' => '100 Tula Para Kay Stella',
            'genre_id' => $romance->id,
            'rating' => 7.5,
            'year' => 2017,
        ]);

        Movie::create([
            'title' => 'Ang Pangarap Kong Holdap',
            'genre_id' => $comedy->id,
            'rating' => 7.5,
            'year' => 2018,
        ]);

        Movie::create([
            'title' => 'El Presidente',
            'genre_id' => $historical->id,
            'rating' => 7.0,
            'year' => 2012,
        ]);

        Movie::create([
            'title' => 'Bonifacio: Ang Unang Pangulo',
            'genre_id' => $historical->id,
            'rating' => 7.2,
            'year' => 2014,
        ]);
    }
}