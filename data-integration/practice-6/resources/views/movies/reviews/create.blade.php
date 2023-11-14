@extends('layouts.app')

@section('title', 'Add a Review')

@section('content')

    <form action="{{ route('movies.reviews.store', $movie) }}" method="post">
        @csrf

        <label for="rating">Rating</label>
        <select name="rating" id="rating">
            <option value="1">1/5</option>
            <option value="2">2/5</option>
            <option value="3">3/5</option>
            <option value="4">4/5</option>
            <option value="5">5/5</option>
        </select>

        <label for="comment">Leave a comment</label>
        <textarea name="comment" id="comment"></textarea>

        <button>Add Review</button>
    </form>

@endsection
