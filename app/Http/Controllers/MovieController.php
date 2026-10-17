<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request) 
    {
        $movies = Movie::all();
        $genre  = 'all';
        $year   = 'all';

        return view('movies.index', compact('movies', 'genre', 'year'));
    
    
        $genre = $request->query('genre', 'all');
        $year  = $request->query('year', 'all');

        $movies = $this->movies();

        if ($genre !== 'all') {
             $movies = array_filter($movies, fn($m) => $m['genre'] === $genre);
        }

        if ($year !== 'all') {
             $movies = array_filter($movies, fn($m) => $m['year'] == $year);
        }

        return view('movies.index', [
            'movies' => $movies,
             'genre'  => $genre,
             'year'   => $year,
         ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'title'  => 'required|string|max:100',
        'genre'  => 'required|in:Action,Comedy,Fantasy',
        'rating' => 'required|numeric|min:0|max:10',
        'year'   => 'required|integer|min:1900|max:2030',
    ]);

    $movies = $this->movies();

    $nextId = empty($movies) ? 1 : max(array_keys($movies)) + 1;

    $movies[$nextId] = [
        'id'     => $nextId,
        'title'  => $validated['title'],
        'genre'  => $validated['genre'],
        'rating' => (float) $validated['rating'],
        'year'   => (int) $validated['year'],
    ];

    $this->saveMovies($movies);

    return redirect()
        ->route('movies.index')
        ->with('success', 'Movie added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    
    
    //    $movies = $this->movies();

    //     if (!isset($movies[$id])) {
    //         abort(404);
    //     }

    //     return view('movies.show', ['movie' => $movies[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Filter movies by genre.
     */
    public function filter($genre = null)
    {
        $movies = $this->movies();
        if ($genre) {
            $movies = array_filter($movies, function ($movie) use ($genre) {
                return $movie['genre'] === $genre;
            });
        }

        return view('movies.filter', ['movies' => $movies, 'activeGenre' => $genre]);
    }

    private function movies()
    {
        $path = storage_path('movies.json');

        return json_decode(file_get_contents($path), true);
    }

    private function saveMovies(array $movies){
        file_put_contents(
            storage_path('movies.json'),
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

}