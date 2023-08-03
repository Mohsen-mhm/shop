@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">کاربران</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-success btn-sm">افزودن</a>
    </div>

    <div class="row">
        <table class="table table-dark table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">ایدی</th>
                <th scope="col">آواتار</th>
                <th scope="col">نام</th>
                <th scope="col">ایمیل</th>
                <th scope="col">ادمین</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="{{ $user->avatar == '' ? '/images/default-avatar.png' : $user->avatar }}" alt="user avatar"
                             style="width: 40px; height: 40px; border-radius: 100px"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_superuser)
                            <p class="badge badge-success badge-pill">بله</p>
                        @else
                            <p class="badge badge-danger badge-pill">خیر</p>
                        @endif
                    </td>
                    <td>
                        <div class="w-50 d-flex justify-content-evenly">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">ویرایش</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{{ $users->links() }}</div>
@endsection
