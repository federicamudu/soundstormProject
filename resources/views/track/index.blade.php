<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="display-1 text-uppercase">
                    tutti i brani
                </h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($tracks as $track)
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="text-center">
                        <img src="{{Storage::url($track->cover)}}" alt="{{$track->title}}" width="200" class="p-3 rounded-pill">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{$track->title}}</h5>
                        <p class="card-text">{{$track->description}}</p>
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
            </div>
            @endforeach
        </div>
    </div>
</x-layout>