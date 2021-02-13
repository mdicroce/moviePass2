@extends('layouts.app')

@section('content')
    @isset($movies)
        @foreach ($movies as $movie)
            <div>
                

            </div>
        @endforeach
        
    @endisset
@endsection
