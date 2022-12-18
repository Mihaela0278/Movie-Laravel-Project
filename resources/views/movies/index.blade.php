@extends('layouts.mainlayout')

@section('content')

    <div class="album text-muted">

        <div class="container">

            <form class="mb-2" method="POST" action="{{ route('movies.search') }}">
                @csrf
                <input type="text" placeholder="{{ __('Name') }}" name="name" class="block rounded p-1 mb-1"/>
                <input type="text" placeholder="{{ __('Release Year') }}" name="releaseYear" class="block rounded p-1"/>
                <x-jet-secondary-button type="submit" class="mt-1">{{ __('Search') }}</x-jet-secondary-button>
            </form>

            <div class="row">
                @foreach($movies as $movie)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $movie->photo_path }}" alt="{{ $movie->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->name }}</h5>
                                <p class="card-text">Released in: {{ $movie->release_year }}</p>
                                <p class="card-text">Language: {{ $movie->language }}</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            <a href="{{ route('movies.show', $movie->id) }}">View</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

@endsection
