@extends('profile.app')

@section('card')
    <div class="row mx-auto">
        <div class="w-100 d-flex justify-content-center align-items-center mb-3">
            <img src="{{ $user->avatar == '' ? '/images/default-avatar.png' : $user->avatar }}" alt="user avatar"
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
        <form action="{{ route('profile.edit') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="name" class="text-muted">نام:</label>
                    <input id="name" type="text"
                           class="border-secondary form-control @error('name') is-invalid @enderror mt-2 bg-dark text-light"
                           name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="avatar" class="text-muted">تصویر پروفایل:</label>
                    <input id="avatar" type="file"
                           class="border-secondary form-control @error('avatar') is-invalid @enderror mt-2 bg-dark text-light"
                           name="avatar" value="{{ old('avatar', $user->avatar) }}" autocomplete="avatar"
                           autofocus>
                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('ویرایش') }}</button>
        </form>
    </div>
@endsection
