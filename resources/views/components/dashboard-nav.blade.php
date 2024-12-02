<div class="container g-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary text-uppercase">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a href="{{route('admin.dashboard')}}" aria-current="page" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('admin.dashboard.users')}}" class="nav-link">Utenti</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('admin.dashboard.tracks')}}" class="nav-link">Brani</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('admin.dashboard.genres')}}" class="nav-link">Generi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>