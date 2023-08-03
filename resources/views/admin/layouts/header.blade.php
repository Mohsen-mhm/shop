<nav class="navbar navbar-expand-md navbar-dark shadow-lg mb-4"  style="background: #1e2125">
    <div class="container-fluid">
        <a class="navbar-brand me-5" href="{{ route('admin.home') }}">پنل مدیریت</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'admin.home' ? 'active' : '' }}"
                       aria-current="page" href="{{ route('admin.home') }}">داشبورد</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ in_array(\Route::currentRouteName(),['admin.users.index','admin.users.create','admin.users.edit']) ? 'active' : '' }}"
                       href="{{ route('admin.users.index') }}">کاربران</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ in_array(\Route::currentRouteName(),['admin.products.index','admin.products.create','admin.products.edit']) ? 'active' : '' }}"
                       href="{{ route('admin.products.index') }}">محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ in_array(\Route::currentRouteName(),['admin.orders.index','admin.orders.create','admin.orders.edit']) ? 'active' : '' }}"
                       href="{{ route('admin.orders.index') }}">سفارشات</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
