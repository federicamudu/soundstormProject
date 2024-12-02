<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">
                    Inserisci il tuo brano
                </h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{route('track.create')}}" method="POST" class="rounded p-5 border" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        @error('title')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" class="form-control" id="cover" name="cover">
                        @error('cover')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="path" class="form-label">Brano</label>
                        <input type="file" class="form-control" id="path" name="path">
                        @error('path')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione del brano</label>
                        <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                        @error('description')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Generi</label>
                        <div>
                            @foreach ($genres as $genre)
                                <input type="checkbox" name="genres[]" value="{{$genre->id}}" class="btn-check" id="btn-check{{$genre->id}}" autocomplete="off">
                                <label for="btn-check{{$genre->id}}" class="btn btn-outline-dark my-1 text-capitalize">{{$genre->name}}</label>
                            @endforeach
                        </div>
                        @error('genres')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiungi</button>
                    <a href="{{route('homepage')}}" class="btn btn-outline-primary">Torna alla home</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>