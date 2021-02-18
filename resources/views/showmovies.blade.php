@extends('layouts.app')

@section('content')
<section class="container-md bg-dark px-4">
    @isset($movies)
        @foreach ($movies as $movie)
            <article class="row gx-5">
                <div class="col p-3">
                    <figure>
                        <img class="img-thumbnail rounded" src="{{'https://image.tmdb.org/t/p/w500/' . $movie->poster_path}}" alt="{{"Poster de".$movie->title}}">
                    </figure>
                    <h4 class="text-light">{{$movie->title}}</h4>
                    <h6 class="text-white-50">{{$movie->original_title}}</h6>

                </div>
            </article>
        @endforeach
        
    @endisset

</section>
@endsection
