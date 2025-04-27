<header>
    <style>
        .navbar-nav .nav-link.active {
            color: rgb(217, 223, 229) !important;
            background-color: transparent !important;
            border-bottom: 1px solid white !important;
            font-weight: bold !important;
        }
    </style>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white font-bold" href="{{ url('/') }}">Raffleit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                {{-- <i class='bx bx-menu'></i> --}}
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                           href="{{ url('/') }}"
                           aria-current="{{ request()->is('/') ? 'page' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                           href="{{ url('about') }}"
                           aria-current="{{ request()->is('about') ? 'page' : '' }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('howitworks') ? 'active' : '' }}"
                           href="{{ url('howitworks') }}"
                           aria-current="{{ request()->is('howitworks') ? 'page' : '' }}">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                           href="{{ url('contact') }}"
                           aria-current="{{ request()->is('contact') ? 'page' : '' }}">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                               href="{{ url('login') }}"
                               aria-current="{{ request()->is('login') ? 'page' : '' }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
{{-- 
<ul class="navbar-nav ms-auto">
    @auth
        <li class="nav-item">
            <a class="nav-link btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Logout</button>
            </form>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
               href="{{ url('login') }}"
               aria-current="{{ request()->is('login') ? 'page' : '' }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
        </li>
    @endauth
</ul> --}}
