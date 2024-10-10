<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('dashboard')}}">COVID Vaccine Registration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('dashboard') ? 'active' : ''}}" aria-current="page" href="{{url('dashboard')}}" >Home</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('/search') ? 'active' : ''}}" aria-current="page" href="{{url('/search')}}">Search</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('/register') ? 'active' : ''}}" aria-current="page" href="{{url('/register')}}">Registration
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>