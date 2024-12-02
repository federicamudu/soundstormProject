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
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Iscritto dal</th>
                            <th scope="col">Ruolo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format('d/m/Y')}}</td>
                            <td>{{$user->profile->is_admin ? 'Admin' : 'Utente'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>