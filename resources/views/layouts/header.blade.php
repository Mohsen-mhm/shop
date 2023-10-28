<nav class="navbar navbar-expand-md navbar-dark shadow-lg mb-4 py-4" dir="ltr">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-lg fa-coffee text-warning"></i>
            {{ config('app.name', 'Ashvan Cafe') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-sm btn-warning my-1" href="{{ route('register') }}">{{ __('عضویت') }}</a>
                        </li>
                    @endif
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-sm btn-primary my-1" href="{{ route('login') }}">{{ __('ورود') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu- text-center bg-dark border-secondary" aria-labelledby="navbarDropdown">
                            <a href="{{ route('home') }}" class="dropdown-item text-light">{{ __('صفحه اصلی') }}</a>
                            <a href="{{ route('profile.home') }}" class="dropdown-item text-light">{{ __('پروفایل') }}</a>
                            <a href="{{ route('cart') }}" class="dropdown-item text-light">{{ __('سبد خرید') }}</a>

                            <hr class="text-light m-1">
                            <a class="dropdown-item text-light" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
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

<style>
    .dropdown-item:hover{
        background: #2a313b;
    }
</style>
