@extends('layouts.app')

@section('title', "Movies")

@section('content')

    <div>
        <a href="{{ route('movies.create') }}">Add a Movie</a>
    </div>

    @forelse ($movies as $movie)
        <div>
            <div>
                <a href="{{ route('movies.show', $movie) }}">{{ $movie->title }}</a>
                <span>Directed by {{ $movie->director }}</span>
            </div>
            <div>
                {{ number_format($movie->reviews_avg_rating, 1) }} out of {{ $movie->reviews_count }} reviews
            </div>
        </div>
    @empty
        <div>No movies in database</div>
    @endforelse

    {{ $movies->links() }}

@endsection
