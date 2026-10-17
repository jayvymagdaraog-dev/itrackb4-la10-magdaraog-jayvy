<?php

namespace Database\Seeders;
use App\Models\Movie;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Movie::create([
            'title' => 'Heneral Luna',
            'genre' => 'Historical',
            'rating' => 8,
            'year' => 2015,
            'is_showing' => false,
        ]);

        Movie::create([
            'title' => 'Kita Kita',
            'genre' => 'Romance',
            'rating' => 7,
            'year' => 2017,
            'is_showing' => true,
        ]);

        Movie::create([
            'title' => 'Four Sisters and a Wedding',
            'genre' => 'Comedy',
            'rating' => 7,
            'year' => 2013,
            'is_showing' => false,
        ]);

        Movie::create([
            'title' => 'Goyo: Ang Batang Heneral',
            'genre' => 'Historical',
            'rating' => 7,
            'year' => 2018,
            'is_showing' => true,
        ]);

        Movie::create([
            'title' => 'Hello, Love, Goodbye',
            'genre' => 'Romance',
            'rating' => 7,
            'year' => 2019,
            'is_showing' => true,
        ]);
    }
}
