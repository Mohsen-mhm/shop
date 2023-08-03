@extends('layouts.master')

@section('css')
    <style>
        .list-unstyled:hover {
            background: #5161CE;
            color: #ffffff;
        }

        .nav-link.active {
            background: #5161CE;
            color: #ffffff;
        }
    </style>

@endsection

@section('content')
    <div class="card mb-3 w-75 bg-dark shadow-lg border-secondary">
        <div class="card-header border-secondary">
            <ul class="list-group p-0 d-flex flex-row justify-content-start align-items-center">
                <li class="list-unstyled m-1 rounded-2"><a href="{{ route('profile.home') }}"
                                                           class="nav-link rounded-2 p-3 pt-2 pb-2 text-light {{ \Route::currentRouteName() == "profile.home" ? "active":"" }}">پروفایل</a>
                </li>
                <li class="list-unstyled m-1 rounded-2"><a href="{{ route('profile.setting') }}"
                                                           class="nav-link rounded-2 p-3 pt-2 pb-2 text-light {{ \Route::currentRouteName() == "profile.setting" ? "active":"" }}">تنظیمات</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            @yield('card')
        </div>
    </div>
@endsection
