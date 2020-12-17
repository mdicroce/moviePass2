<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\Models\genre_movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $apiController;
    public function __construct()
    {
        $this->apiController = new ApiController();
    }
    public function index()
    {
        $movies = DB::table('movies')->get();

        return view('movie.index',['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $jsonResults = $this->apiController->index()->getBody()->getContents();
        $array = ($jsonResults) ? json_decode($jsonResults, true) : array();
        
        foreach ($array["results"] as $movie) {
            $newMovie = new Movie();
            $newMovie->id = $movie["id"];
            $newMovie->title = $movie["title"];
            $newMovie->original_title = $movie["original_title"];
/*                 $newMovie->runtime = $movie["runtime"]; */
            $newMovie->release_date = $movie["release_date"];
            $newMovie->poster_path = $movie["poster_path"];
            $newMovie->overview = $movie["overview"];
            $newMovie->original_language = $movie["original_language"];
            $newMovie->save();
            foreach ($array["results"]["genre_ids"] as $genres)
            {
                $genresXmovie = new genre_movie();
                $genresXmovie->id_movie = $movie["id"];
                $genresXmovie->id_genre = $genres;
            }
        }
        

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $movie = Movie::where('id',$id)->get();

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}