<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::withAvgRating()->withReviewsCount()->paginate();
        
        return view('movies.index', compact('movies'));
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
        $data = $request->validate([
            'title' => 'required|max:255',
            'director' => 'required|max:255',
            'description' => 'nullable',
            'release_date' => 'nullable',
        ]);

        Movie::create($data);
        return redirect(route('movies.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::withAvgRating()->withReviewsCount()->findOrFail($id);

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'director' => 'required|max:255',
            'description' => 'nullable',
            'release_date' => 'nullable',
        ]);

        $movie->update($data);
        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect(route('movies.index'));
    }
}
