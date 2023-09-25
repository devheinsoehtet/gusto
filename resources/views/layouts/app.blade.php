<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Car Rental') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Car Rental') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => url()->current() == route('dashboard.index'),
                            ]) aria-current="page"
                                href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => url()->current() == route('cars.index'),
                            ]) aria-current="page"
                                href="{{ route('cars.index') }}">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => url()->current() == route('bookings.index'),
                            ]) aria-current="page"
                                href="{{ route('bookings.index') }}">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a @class([
                                'nav-link',
                                'active' => url()->current() == route('roles.index'),
                            ]) aria-current="page"
                                href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('bookings.index') }}">Bookings</a>
                        </li>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast" role="alert" id="toastAlert">
                <div class="toast-body">
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        const actionStatus = {{ Js::from($actionStatus ?? null) }};;
        const actionMessage = {{ Js::from($actionMessage ?? null) }};

        if (actionStatus && actionMessage) {
            const eToastAlert = document.getElementById('toastAlert');

            const toastAlert = Toast.getOrCreateInstance(eToastAlert);
            switch (actionStatus) {
                case 'success':
                    eToastAlert.classList.add('text-bg-success');
                    break;
                case 'warn':
                    eToastAlert.classList.add('text-bg-warning');
                    break;
                case 'fail':
                    eToastAlert.classList.add('text-bg-danger');
                    break;
            }
            eToastAlert.querySelector('.toast-body').innerHTML = actionMessage;
            toastAlert.show();
        }
    </script>
</body>



</html>
