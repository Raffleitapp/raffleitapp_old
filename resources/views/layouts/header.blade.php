<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Raffleit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
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
                        <li class="nav-item nav-icon">
                            <a class="nav-link"
                               href="{{ auth()->user()->user_type == 'user' ? url('user/dashboard') : url('host/dashboard') }}"
                               aria-label="User Dashboard">
                                <i class='bx bx-user-circle' style='font-size: 30px;'></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
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