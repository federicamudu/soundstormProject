<div class="container fixed-top border-bottom border-black g-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{route('homepage')}}">SoundS</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homepage')}}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" style="min-width: max-content;" href="{{route('track.create')}}">Aggiungi <i class="bi bi-file-earmark-music-fill"></i></a>
                </li>
                @endauth
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile.page')}}">Profilo</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout-form').submit()">Logout</a></li>
                        <form action="{{route('logout')}}" method="POST" id="logout-form" class="d-none">@csrf</form>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Benvenuto
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>