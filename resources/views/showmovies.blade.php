@extends('layouts.app')

@section('content')
<section class="container-fluid bg-dark">
    @isset($movies)
    <article class="d-flex justify-content-center flex-wrap p-3">
        
        @foreach ($movies as $movie)
            
            <div class="col-s w-75 d-sm-flex shadow-lg rounded m-3 pl-3 pr-3 align-items-center">
                <figure class="rounded-circle bg-primary overflow-hidden position-relative shadow mx-auto" style="height:40vh; width:40vh" >
                    <img class=" w-100 h-auto" src="{{'https://image.tmdb.org/t/p/w500/' . $movie->poster_path}}" alt="{{"Poster de".$movie->title}}">
                    
                </figure>
                <div class="mx-auto w-50">
                    
                    <h3 class="text-white display-4">{{$movie->title}}</h4>
                    <h4 class="text-muted">{{$movie->original_title}}</h6>
                        @foreach ($movie->genres()->get() as $genre)
                        <span class="text-info">{{$genre->name}}</span>
                    @endforeach
                    <p class="text-light">{{$movie->overview}}</p>
                    
                </div>

            </div>
            @endforeach
    </article>
        
    @endisset

</section>
@endsection
