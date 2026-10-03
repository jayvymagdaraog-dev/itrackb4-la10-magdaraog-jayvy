
@extends('layouts.app')

@section('title', 'Add Movies')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
                Add Movies
            </h3>

            <form method="POST" action="{{ route('movies.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" required>
                    @error('genre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" step="0.1" min="0" max="10" required>
                    @error('rating')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Movie</button>
            </form>
        </div>
    </div>
@endsection