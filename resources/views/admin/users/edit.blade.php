@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">ویرایش کاربر</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-info btn-sm">بازگشت</a>
    </div>

    <div class="row">
        <div class="w-100 d-flex justify-content-center align-items-center mb-3">
            <img src="{{ $user->avatar == '' ? '/storage/avatars/default-avatar.png' : $user->avatar }}"
                 alt="user avatar"
                 style="width: 100px; height: 100px; border-radius: 100px">
        </div>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <ul class="list-group">
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
        @endif
        <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label text-light">نام کاربر:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror text-light" style="background: #1e2125" id="name" name="name"
                           value="{{ old('name', $user->name) }}" autofocus required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="avatar" class="form-label text-light">آواتار:</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror text-light" style="background: #1e2125" id="avatar"
                           name="avatar" autofocus>
                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-6">
                    <label for="email" class="form-label text-light">ایمیل کاربر:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror text-light" style="background: #1e2125" id="email"
                           name="email" value="{{ old('email', $user->email) }}" autofocus required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="password" class="form-label text-light">رمز عبور دلخواه:</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror text-light" style="background: #1e2125" id="password"
                           name="password" value="{{ old('password') }}" autofocus
                           placeholder="در صورت وارد نشدن رمز قبلی باقی می ماند.">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <label for="superuser" class="form-label text-light">ادمین است؟</label>
                    <select name="is_superuser" id="superuser"
                            class="form-select @error('superuser') is-invalid @enderror text-light" style="background: #1e2125">
                        <option value="0" @if(!$user->is_superuser) selected @endif>خیر</option>
                        <option value="1" @if($user->is_superuser) selected @endif>بله</option>
                    </select>
                    @error('superuser')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success mt-4">ویرایش</button>
        </form>
    </div>
@endsection
