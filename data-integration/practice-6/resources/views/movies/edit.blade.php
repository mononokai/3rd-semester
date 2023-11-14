@extends('layouts.app')

@section('title', 'Edit {{ $movie->title }}')

@section('content')

<div>
    <form action="{{ route('movies.update', $movie) }}" method="POST">
        @csrf
        @method('put')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}">

            <label for="director">Director</label>
            <input type="text" name="director" id="director" value="{{ old('director', $movie->director) }}">

            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $movie->description) }}</textarea>

            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $movie->release_date) }}">

            <button>Update Movie</button>
    </form>
</div>

@endsection
