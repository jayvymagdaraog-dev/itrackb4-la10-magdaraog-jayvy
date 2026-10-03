
@extends('layouts.app')

@section('title', 'Movie List')

@section('content')

    <h2 class="mb-3">All Movies</h2>

    <div class="mb-3">
        <a href="{{ route('movies.create') }}" class="btn btn-success">
            Add New Movie
        </a>
    </div>

    <div class="mb-3">
        <strong>Genre:</strong>
        @foreach (['Action', 'Sci-Fi', 'Drama'] as $g)
            <a href="{{ route('movies.index', ['genre' => $g, 'year' => $year]) }}"
               class="btn btn-outline-primary btn-sm me-1">
                {{ $g }}
            </a>
        @endforeach
    </div>

    <div class="mb-3">
        <strong>Year:</strong>
        @foreach ([2008, 2010, 2014, 2019, 1999, 2012] as $y)
            <a href="{{ route('movies.index', ['genre' => $genre, 'year' => $y]) }}"
               class="btn btn-outline-primary btn-sm me-1">
                {{ $y }}
            </a>
        @endforeach

        <a href="{{ route('movies.index') }}"
           class="btn btn-secondary btn-sm ms-2">
            Clear all filters
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movies as $movie)
                    <tr>
                        <td>{{ $movie['id'] }}</td>
                        <td>
                            <a href="{{ route('movies.show', $movie['id']) }}">
                                {{ $movie['title'] }}
                            </a>
                        </td>
                        <td>{{ $movie['genre'] }}</td>
                        <td>{{ $movie['rating'] }}</td>
                        <td>
                            {{ $movie['year'] }}
                            @if ($movie['year'] >= 2020)
                                <span class="badge bg-success">New Release</span>
                            @else
                                <span class="badge bg-secondary">Classic</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No movies found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 mb-3 text-start">
        <p>Prepared by: Jayvy P. Magdaraog</p>
    </div>

</div>
@endsection