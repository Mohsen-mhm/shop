@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">ایجاد محصول جدید</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-info btn-sm">بازگشت</a>
    </div>

    <div class="row">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <ul class="list-group">
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
        @endif
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="title" class="form-label text-light">عنوان محصول:</label>
                    <input type="text" class="form-control @error('avatar') is-invalid @enderror text-light" style="background: #1e2125" id="title"
                           name="title" autofocus required>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="picture" class="form-label text-light">عکس محصول:</label>
                    <input type="file" class="form-control @error('picture') is-invalid @enderror text-light" style="background: #1e2125" id="picture"
                           name="picture" autofocus>
                    @error('picture')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <label for="description" class="form-label text-light">توضیحات محصول:</label>
                    <textarea class="form-control @error('avatar') is-invalid @enderror text-light" style="background: #1e2125" name="description" id="description" rows="5" autofocus required></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <label for="price" class="form-label text-light">قیمت:</label>
                    <input type="number" class="form-control @error('avatar') is-invalid @enderror text-light" style="background: #1e2125" id="price"
                           name="price" autofocus required>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inventory" class="form-label text-light">موجودی:</label>
                    <input type="number" class="form-control @error('avatar') is-invalid @enderror text-light" style="background: #1e2125" id="inventory"
                           name="inventory" autofocus required>
                    @error('inventory')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success mt-4">ایجاد</button>
        </form>
    </div>
@endsection
