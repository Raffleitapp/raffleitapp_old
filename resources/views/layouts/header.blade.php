<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}" style="color: white; font-weight: 600;">
                Raffleit
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('howitworks') }}">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    @if (session()->has('user_id') && session()->get('user_type'))
                        <li class="nav-item nav-icon">
                            <a class="nav-link"
                                href="{{ session()->get('user_type') == 'user' ? url('user/dashboard') : url('host/dashboard') }}">
                                <img src="{{ asset('img/account_circle.png') }}" alt="Account" width="30"
                                    height="30">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-raffle" href="{{ url('raffles') }}">View Raffles</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
