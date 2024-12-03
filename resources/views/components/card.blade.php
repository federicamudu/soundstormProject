<div class="card">
    <div class="card-header text-body-secondary small text-center">
        <a href="{{route('track.edit', compact('track'))}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
        <form action="{{route('track.destroy', compact('track'))}}" class="d-inline" method="POST" onclick="return confirm('Sicuro di voler cancellare questo brano?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
        </form>

        <a href="{{route('track.download', compact('track'))}}" class="btn btn-sm btn-primary"><i class="bi bi-cloud-download"></i></a>

    </div>
    <div class="text-center">
        <img src="{{Storage::url($track->cover)}}" alt="{{$track->title}}" width="200" class="p-3 rounded-pill">
    </div>

    <div class="card-body">
        <h5 class="card-title">{{$track->title}}</h5>
        <p class="card-text">{{$track->description}}</p>
        <div class="mb-3">
            <p class="fw-bold m-0">Generi</p>
            @if ($track->genres->count())
            @foreach ($track->genres as $genre)
            <a href="{{route('track.filterByGenre', ['genre' => $genre])}}" class="me-1 small fst-italic">#{{$genre->name}}</a href="{{route('track.filterByGenre', ['genre' => $genre])}}">
            @endforeach
            @else
            <span class="me-1 small fst-italic">Genere sconosciuto</span>
            @endif
        </div>
        <div>
            <audio class="w-100" controls>
                <source src="{{Storage::url($track->path)}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
    <div class="card-footer text-body-secondary small">
        Inserito da: <a href="{{route('track.filterByUser', ['user' => $track->user])}}">
            {{$track->user->name}}</a> - {{$track->created_at->format('d/m/Y')}}
    </div>
</div>