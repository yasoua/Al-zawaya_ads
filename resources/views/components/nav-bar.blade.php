<nav class="navbar-light bg-white shadow-sm px-3 py-2">
    <div class="row justify-content-between">
        <div class="col-6 col-md-4 text-center">
            <a href="{{ route('dashboard') }}" style="text-decoration: none;" class="text-dark d-inline-flex fs-1 align-items-center">
                <img src="{{ asset('public/images/شركة-الزوايا.png') }}" alt="alzawaya logo" width="32" height="32" class="me-2">
                Al-Zawaya
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <div class="dropdown ">
                <button class="btn border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="iconify fs-3" data-icon="solar:smile-circle-linear"></span>
                </button>
                <ul class="dropdown-menu">

                    @auth()
                        <span class="text-primary dropdown-item text-xs font-bold uppercase border-bottom pt-2 pb-3 bg-white">Welcome, {{ auth()->user()->name }} !</span>
                        <li><a class="dropdown-item mt-2 d-flex align-items-center" href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit;"><span class="iconify me-1" data-icon="material-symbols:dashboard-rounded"></span> Dashboard</a></li>
                        <li><a class="dropdown-item mt-2 d-flex align-items-center" href="{{ route('lead.index') }}" style="text-decoration: none; color: inherit;"><span class="iconify me-1" data-icon="ic:baseline-person"></span> Leads</a></li>
                        <li><a class="dropdown-item mt-2 d-flex align-items-center" href="{{ route('ad.create') }}" style="text-decoration: none; color: inherit;">
                                <span class="iconify me-2" data-icon="material-symbols:add"></span>
                                New Ad</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}" style="text-decoration: none; color: inherit;"><span class="iconify me-1" data-icon="mdi:users-add"></span> New Account</a></li>
                        <li>
                            <div class="" aria-labelledby="navbarDropdown" data-bs-popper="static">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="iconify me-1" data-icon="mdi:logout"></span> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                        </li>
                    @endauth

                    @guest()
                        <span class="text-primary dropdown-item text-xs font-bold uppercase border-bottom pt-2 pb-3 bg-white">Welcome, Guest !</span>
                        @if(!str_contains(url()->current(), 'login'))
                            <li><a class="dropdown-item mt-2" href="{{ asset('login') }}" style="text-decoration: none; color: inherit;">Login</a></li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
