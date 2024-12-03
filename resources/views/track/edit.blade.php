<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercare">
                    Aggiorna il tuo brano
                </h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 border rounded h-100 p-5">
                <div class="d-flex flex-column align-items-center mb-4">
                    <label for="" class="form-label fw-bold">Cover attuale</label>
                    <img src="{{Storage::url($track->cover)}}" class="rounded-pill" alt="Cover {{$track->title}}" width="200">
                </div>
                <div class="d-flex flex-column align-items-center mb-4">
                    <label for="" class="form-label fw-bold">Brano attuale</label>
                    <audio class="w-100" controls>
                        <source src="{{Storage::url($track->path)}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form action="{{route('track.update', compact('track'))}}" method="POST" class="rounded p-5 border" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$track->title}}">
                        @error('title')
                            <div class="small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" name="cover" class="form-control" id="cover">
                        @error('cover')
                            <div class="small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="path" class="form-label">Brano</label>
                        <input type="file" name="path" class="form-control" id="path">
                        @error('path')
                            <div class="small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione del brano</label>
                        <textarea type="text" name="description" class="form-control" id="description">{{old('description', $track->description)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Generi</label>
                        @foreach ($genres as $genre)
                        <input type="checkbox"
                                name="genres[]"
                                value="{{$genre->id}}"
                                class="btn-check"
                                id="btn-check-{{$genre->id}}"
                                autocomplete="off"
                                {{$genre->tracks->contains($track) ? 'checked' : ''}}>
                        <label for="btn-check-{{$genre->id}}" class="btn btn-outline-dark my-1">{{$genre->name}}</label>
                        @endforeach
                    </div>
                    @error('genres')
                        <div class="small fst-italic text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Aggiorna</button>
                    <a href="{{route('homepage')}}" class="btn btn-outline-primary">Torna alla home</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>