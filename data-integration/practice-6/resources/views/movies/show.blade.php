@extends('layouts.app')

@section('title', $movie->title)

@section('content')

    <div>
        <div>
            <div>
                <h1>{{ $movie->title }}</h1>
                <span>Directed by {{ $movie->director }}</span>
            </div>
            <div>
                {{ number_format($movie->reviews_avg_rating, 1) }} out of {{ $movie->reviews_count }} reviews
            </div>
            <div>
                {{ $movie->description }}
            </div>
            <div>
                Released on {{ $movie->release_date }}
            </div>
            <div>
                <a href="{{ route('movies.edit', $movie) }}">Edit</a>
            </div>
            <div>
                <form action="{{ route('movies.destroy', $movie) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button>Delete</button>
                </form>
            </div>
            <div>
                <a href="{{ route('movies.index') }}">Back to all movies</a>
            </div>
        </div>

        <div>
            <h2>Reviews</h2>

            <div>
                <a href="{{ route('movies.reviews.create', $movie) }}">Add a Review</a>
            </div>

            <ul>
                @forelse ($movie->reviews as $review)
                    <li>
                        <div>
                            <div>
                                <span>{{ $review->rating }}/5</span>
                            </div>
                            <div>
                                {{ $review->comment }}
                            </div>
                        </div>
                    </li>
                @empty
                    <li>No reviews for this movie</li>
                @endforelse
            </ul>
        </div>
    </div>

@endsection
