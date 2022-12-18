<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Producer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function search(Request $request)
    {
        $name = is_null($request['name']) ? '' : $request['name'];
        $releaseYear = is_null($request['releaseYear']) ? '' : $request['releaseYear'];

        $movies = Movie::query()
            ->where('name', 'like', "%$name%")
            ->where('release_year', 'like', "%$releaseYear%")
            ->get();

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        $movie_producers = DB::table('movie_producers')->where('movie_id', $movie->id)
            ->pluck('producer_id');

        $producers = array();
        foreach($movie_producers as $movie_producer)
        {
            $producers[] = Producer::all()->where('id', (int)$movie_producer);
        }

        $movie_genres = DB::table('movie_genres')->where('movie_id', $movie->id)
            ->pluck('genre_id');

        $genres = array();
        foreach($movie_genres as $movie_genre)
        {
            $genres[] = Genre::all()->where('id', (int)$movie_genre);
        }

        return view('movies.show', compact('movie','producers','genres'));
    }
}
