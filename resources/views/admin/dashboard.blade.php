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
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Totale utenti</p>
                        <p class="card-text fs-1">{{$usersCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Totale brani</p>
                        <p class="card-text fs-1">{{$tracksCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Totale dimensione brani</p>
                        <p class="card-text fs-1">{{$tracksSize}} MB</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Utenti iscritti settimana precedente</p>
                        <p class="card-text fs-1">{{$lastWeekUsers}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Brani inseriti settimana precedente</p>
                        <p class="card-text fs-1">{{$lastWeekTracks}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>