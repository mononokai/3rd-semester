@extends('layouts.app')

@section('title', 'Add a Movie')

@section('content')

    <form action="{{ route('movies.store') }}" method="post">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">

        <label for="director">Director</label>
        <input type="text" name="director" id="director" value="{{ old('director') }}">

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>

        <label for="release_date">Release Date</label>
        <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}">

        <button>Add Movie</button>
    </form>

@endsection
