<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">
                    Admin dashboard
                </h1>
            </div>
        </div>
    </div>
    <x-dashboard-nav></x-dashboard-nav>
    <div class="container my-5">
        <div class="row justify-content-around">
            <div class="col-12 col-md-4">
                <form action="{{route('admin.dashboard.genres.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Genere</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea genere</button>
                </form>
            </div>
            @if (session('success'))
                <div class="row justify-content-center">
                    <div class="col-12 alert alert-success text-center">
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @error('name')
            <div class="row justify-content-center">
                    <div class="col-12 alert alert-danger text-center">
                        {{$message}}
                    </div>
                </div>
            @enderror
            <div class="col-12 col-md-6">
                <table class="table striped border">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Genere</th>
                            <th scope="col">Modifica nome genere</th>
                            <th scope="col">Elimina genere</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                        <tr>
                            <th scope="row">{{$genre->id}}</th>
                            <td>{{$genre->name}}</td>
                            <td class="border-start">
                                <form action="{{route('admin.dashboard.genres.update', compact('genre'))}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex align-items-center">
                                        <input type="text" name="name" class="form-control me-3">
                                        <button type="submit" class="btn btn-primary">Modifica</button>
                                    </div>
                                </form>
                            </td>
                            <td class="border-start">
                                <form action="{{route('admin.dashboard.genres.delete', compact('genre'))}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>