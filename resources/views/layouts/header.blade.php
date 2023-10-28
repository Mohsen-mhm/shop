<nav class="navbar navbar-expand-md navbar-dark shadow-lg mb-4 py-4" dir="ltr">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fad fa-mug-hot text-warning" style="font-size: 30px"></i>
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
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px"
                           href="{{ route('register') }}">{{ __('عضویت') }}<i
                                class="fad fa-user-plus text-secondary m-1" style="font-size: 15px"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px"
                           href="{{ route('login') }}">{{ __('ورود') }}<i class="fad fa-sign-in text-secondary m-1"
                                                                          style="font-size: 15px"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px" href="{{ route('cart') }}">{{ __('سبد خرید') }}
                            <i class="fad fa-shopping-cart text-secondary m-1" style="font-size: 15px"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px" href="{{ route('home') }}">{{ __('خانه') }}<i
                                class="fad fa-home text-secondary m-1" style="font-size: 15px"></i></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('خروج') }}
                            <i class="fad fa-sign-out text-secondary m-1" style="font-size: 15px"></i></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px"
                           href="{{ route('profile.home') }}">{{ __('پروفایل') }}<i class="fad fa-user text-secondary m-1"
                                                                                    style="font-size: 15px"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px" href="{{ route('cart') }}">{{ __('سبد خرید') }}
                            <i class="fad fa-shopping-cart text-secondary m-1" style="font-size: 15px"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" style="font-size: 16px" href="{{ route('home') }}">{{ __('خانه') }}<i
                                class="fad fa-home text-secondary m-1" style="font-size: 15px"></i></a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-item .nav-link:hover i{
        transition: all linear 0.2s;
        color: #ffc107;
    }
</style>
