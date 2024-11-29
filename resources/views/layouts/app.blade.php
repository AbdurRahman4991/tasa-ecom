<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/solid.min.css" integrity="sha512-/r+0SvLvMMSIf41xiuy19aNkXxI+3zb/BN8K9lnDDWI09VM0dwgTMzK7Qi5vv5macJ3VH4XZXr60ip7v13QnmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .sidebar {
            min-width: 250px;
            background: #f8f9fa;
            padding: 15px;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }

        .content {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
        }

        .navbar {
            z-index: 10; /* Ensure navbar is above the sidebar */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->role }} {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profileUpdate') }}">
                                        Update Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('changePassword') }}">
                                        Change password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('deleteUser') }}">
                                       Delete account
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="sidebar bg-dark">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{url('/')}}">Website</a>
        </li>


        @auth
            @if (Auth::user()->isAdmin())
                <!-- Menu items for admin -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('showCategory')}}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sub-category.index')}}">Sub category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('showProduct')}}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('showOrder')}}">Order</a>
                </li>
            @endif

            @if (Auth::user()->isVendor())
                <!-- Menu items for vendor -->
                <li class="nav-item">
                    <a class="nav-link" href="#"> My product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> My order</a>
                </li>
            @endif

            @if (Auth::user()->isCustomer())
                <!-- Menu items for customer -->
                <li class="nav-item">
                    <a class="nav-link" href="#">My order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Wish list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Card  list</a>
                </li>
            @endif
        @endauth
    </ul>
</div>


        <div class="content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        new DataTable('#example');
    </script>
</body>
</html>
