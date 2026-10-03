<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genre = $request->query('genre', 'all');
        $year = $request->query('year', 'all');

        $movies = $this->movies();

        if ($genre !== 'all') {
            $movies = array_filter($movies, fn($m) => str_contains($m['genre'], $genre));
        }

        if ($year !== 'all') {
            $movies = array_filter($movies, fn($m) => $m['year'] === (int) $year);
        }

        return view('movies.index', [
            'movies' => $movies,
            'genre' => $genre,
            'year' => $year,
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
        'title' => 'required|string|max:100',
        'genre' => 'required|in:Action,Drama,Sci-Fi',
        'rating' => 'required|numeric|min:0|max:10',
        'year' => 'required|integer|min:1900|max:2030',
    ]);

    $movies = $this->movies();

    $nextID = empty($movies) ? 1 : max(array_keys($movies)) + 1;

    $movies[$nextID] = [
        'id' => $nextID,
        'title' => $validated['title'],
        'genre' => $validated['genre'],
        'rating' => (float) $validated['rating'],
        'year' => (int) $validated['year'],
    ];

    $this->saveMovies($movies);

    return redirect()
        ->route('movies.index')
        ->with('success', 'Movie added successfully');
}

    public function show(string $id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movies[$id]]);
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
     * Display the featured movie.
     */
    public function featured()
    {
        return redirect()->route('movies.show', ['movie' => 2]);
    }

    /**
     * Display movies filtered by year.
     */
    public function filter($year = null)
    {
        $movies = $this->movies();

        if ($year) {
            $year = (int) $year;

            $movies = array_filter($movies, function ($movie) use ($year) {
                return $movie['year'] === $year;
            });
        }

        return view('movies.filter', [
            'movies' => $movies,
            'activeYear' => $year
        ]);
    }

    /**
     * Private movie data helper.
     */
    private function movies()
    {
        $path = storage_path('movies.json');

        return json_decode(file_get_contents($path), true);
    }

    private function saveMovies(array $movies)
    {
        file_put_contents(
            storage_path('movies.json'),
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }
}