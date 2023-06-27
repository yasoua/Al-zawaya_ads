{{--<nav class="d-md-flex justify-content-md-between align-items-md-center rounded-4 border border-black--}}
{{--border-opacity-5--}}
{{-- rounded-xl--}}
{{-- p-md-3 bg-light">--}}
{{--    <div>--}}
{{--        <a href="/dashboard" >--}}
{{--            <img src="public/images/شركة-الزوايا.png" alt="alzawaya logo" width="40" height="40" >--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div class="mt-8 mt-md-0 d-flex align-items-center ">--}}
{{--        @auth--}}
{{--            <a href="/dashboard" class="me-2 " style="text-decoration: none; color: inherit;">Home</a>--}}

{{--            <span  class=" text-xs font-bold uppercase">Welcome, {{ auth()->user()-> name }}!</span>--}}

{{--            <form method="POST" action="/logout" class="">--}}
{{--                @csrf--}}
{{--                <button type="button" class="btn " style="">Logout</button>--}}
{{--            </form>--}}
{{--        @else--}}
{{--                        <a href="/register" class="text-xs font-bold uppercase">Register</a>--}}
{{--            <a href="/login" class="text-xs font-bold uppercase ml-2 text-blue-500">Login</a>--}}

{{--        @endauth--}}
{{--    </div>--}}
{{--</nav>--}}


{{--<!-- Fonts -->--}}
{{--<link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
{{--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">--}}
{{--<!-- End fonts -->--}}

{{--<!-- CSRF Token -->--}}
{{--<meta name="_token" content="paSOPqyVfpzjqwibRJD9qiI3wpzhUtW9DS0agYk1">--}}

{{--<link rel="shortcut icon" href="https://al-zawayaportal.com/assets/images/favicon.png">--}}

{{--<!-- plugin css -->--}}
{{--<link href="https://al-zawayaportal.com/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />--}}
{{--<link href="https://al-zawayaportal.com/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />--}}
{{--<link href="https://al-zawayaportal.com/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />--}}
{{--<!-- end plugin css -->--}}

{{--<link href="https://al-zawayaportal.com/assets/plugins/fullcalendar/main.min.css" rel="stylesheet" />--}}

{{--<!-- common css -->--}}
{{--<link href="https://al-zawayaportal.com/css/app.css" rel="stylesheet" />--}}
{{--<!-- end common css -->--}}


{{--<!-- base js -->--}}
{{--<script src="https://al-zawayaportal.com/js/app.js"></script>--}}
{{--<script src="https://al-zawayaportal.com/assets/plugins/feather-icons/feather.min.js"></script>--}}
{{--<script src="https://al-zawayaportal.com/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>--}}
{{--<!-- end base js -->--}}

{{--<!-- plugin js -->--}}
{{--<script src="https://al-zawayaportal.com/assets/plugins/chartjs/chart.min.js"></script>--}}

{{--<!-- end plugin js -->--}}

{{--<!-- common js -->--}}
{{--<script src="https://al-zawayaportal.com/assets/js/template.js"></script>--}}
{{--<script type="text/javascript" src="https://al-zawayaportal.com/assets/js/printThis.js"></script>--}}
{{--<!-- end common js -->--}}



<nav class="{{--navbar--}} {{--navbar-expand-md--}} navbar-light bg-white shadow-sm p-2 ">

{{--    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">--}}
{{--        <a href="http://127.0.0.1:8000/home" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>--}}
{{--    </div>--}}



    <div class="row">
        <div class="col-4 text-center">
            <a href="{{ asset('dashboard') }}" style="text-decoration: none;" class="text-dark d-inline-flex fs-1 align-items-center">
                <img src="{{ asset('public/images/شركة-الزوايا.png') }}" alt="alzawaya logo" width="32" height="32" class="me-2">
                {{--            <h1 class="--}}{{--ms-2 mt-1 align-self-center--}}{{--">Al-Zawaya</h1>--}}
                Al-Zawaya
            </a>
        </div>
        <div class="col-4">

            <i class="fa-regular fa-face-smile"></i>


        </div>
        <div class="col-4 {{--text-center--}}d-flex align-items-center justify-content-center">
{{--            <div class="d-flex align-items-center">--}}
{{--                <div class="box">Vertical Center Align a Div</div>--}}
            <div class="dropdown ">
                <button class="btn border-0 {{--btn-secondary--}} {{--dropdown-toggle--}}" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="iconify fs-3" data-icon="solar:smile-circle-linear"></span>

                </button>

                    <ul class="dropdown-menu">


                        @auth()
                            <span class="text-primary dropdown-item text-xs font-bold uppercase border-bottom pt-2 pb-3 bg-white">Welcome, {{ auth()->user()->name }} !</span>


                            <li><a class="dropdown-item mt-2" href="{{ asset('dashboard') }}" style="text-decoration: none; color: inherit;">Dashboard</a></li>

                            <li><a class="dropdown-item" href="{{ asset('register') }}" style="text-decoration: none; color: inherit;">Add Account</a></li>

                            <li>
                                <div class="" aria-labelledby="navbarDropdown" data-bs-popper="static">
                                    <a class="dropdown-item" href="{{ asset('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ asset('logout') }}" method="POST" class="d-none">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </div>
                            </li>
                        @endauth

                        @guest()
                            <span class="text-primary dropdown-item text-xs font-bold uppercase border-bottom pt-2 pb-3 bg-white">Welcome, Guest !</span>


                                @if(!str_contains(url()->current(), 'login'))
                                    <li><a class="dropdown-item mt-2" href="{{ asset('login') }}" style="text-decoration: none; color: inherit;">Login</a></li>
{{--                                    <li><a class="dropdown-item" href="{{ asset('register') }}" style="text-decoration: none; color: inherit;">Register</a></li>--}}
                                @else
{{--                                    <li><a class="dropdown-item mt-2" href="{{ asset('register') }}" style="text-decoration: none; color: inherit;">Register</a></li>--}}
                                @endif






                        @endguest



                    </ul>
{{--                @else--}}


{{--                <li>  <a href="/register" class="text-xs font-bold uppercase">Register</a>  </li>--}}
{{--                    <li><a href="/login" class="text-xs font-bold uppercase ml-2 text-blue-500">Login</a></li>--}}

            </div>
{{--            </div>--}}

{{--            <div class="d-inline-flex align-items-center ">--}}
{{--                <img src="{{ asset('public/images/شركة-الزوايا.png') }}" alt="alzawaya logo" width="32" height="32" class="me-2">--}}
{{--                --}}{{--            <h1 class="--}}{{----}}{{--ms-2 mt-1 align-self-center--}}{{----}}{{--">Al-Zawaya</h1>--}}
{{--                Al-Zawaya--}}
{{--            </div>--}}


{{--            <div class="align-middle">--}}
{{--                lskjdhfklsdjh--}}
{{--            </div>--}}





        </div>

    </div>



{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="http://127.0.0.1:8000">--}}

{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <!-- Left Side Of Navbar -->--}}
{{--            <ul class="navbar-nav me-auto">--}}

{{--            </ul>--}}

{{--            <!-- Right Side Of Navbar -->--}}
{{--            <ul class="navbar-nav ms-auto">--}}
{{--                <!-- Authentication Links -->--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="http://127.0.0.1:8000/login">Login</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="http://127.0.0.1:8000/register">Register</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
</nav>

