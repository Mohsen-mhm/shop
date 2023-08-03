@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">ویرایش محصول</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-info btn-sm">بازگشت</a>
    </div>

    <div class="row">
        <div class="w-100 d-flex justify-content-center align-items-center mb-3">
            <img src="{{ $product->picture == '' ? '/storage/products/default.jpg' : $product->picture }}"
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

        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row mt-4">
                <div class="col-6">
                    <label for="title" class="form-label text-light">عنوان محصول:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror text-light" style="background: #1e2125" id="title"
                           name="title" value="{{ old('title', $product->title) }}" autofocus required>
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
                    <textarea class="form-control @error('description') is-invalid @enderror text-light" style="background: #1e2125" name="description"
                              id="description" rows="5" autofocus
                              required>{{ old('description', $product->description) }}</textarea>
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
                    <input type="number" class="form-control @error('price') is-invalid @enderror text-light" style="background: #1e2125" id="price"
                           name="price" value="{{ old('price', $product->price) }}" autofocus required>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="inventory" class="form-label text-light">موجودی:</label>
                    <input type="number" class="form-control @error('inventory') is-invalid @enderror text-light" style="background: #1e2125" id="inventory"
                           name="inventory" value="{{ old('inventory', $product->inventory) }}" autofocus required>
                    @error('inventory')
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
