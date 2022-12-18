<div class="card mb-4 box-shadow">
    <div class="card-body">
        <h5 class="card-title">{{ $movie->name }}</h5>
        <p class="card-text">Released in: {{ $movie->release_year }}</p>
        <p class="card-text">Language: {{ $movie->language }}</p>
        <p class="card-text"> Producers:
           @foreach($producers as $producer)
               @foreach($producer as $currentProducer)
                   {{$currentProducer['first_name']}} {{$currentProducer['last_name']}};
               @endforeach
           @endforeach
        </p>
        <p class="card-text"> Genres:
        @foreach($genres as $genre)
                @foreach($genre as $currentGenre)
                    {{$currentGenre['name']}};
                @endforeach
            @endforeach
        </p>
        <div class="d-flex align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="{{ route('movies.index') }}">Back To List</a>
                </button>
            </div>
        </div>
    </div>
</div>

@include('partials.footer-scripts')
