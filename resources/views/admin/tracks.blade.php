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
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <table class="table striped border">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Inserito il</th>
                            <th scope="col">Inserito da</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracks as $track)
                        <tr>
                            <th scope="row">{{$track->id}}</th>
                            <td>{{$track->title}}</td>
                            <td>{{$track->description}}</td>
                            <td>{{$track->created_at->format('d/m/Y')}}</td>
                            <td>{{$track->user->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>