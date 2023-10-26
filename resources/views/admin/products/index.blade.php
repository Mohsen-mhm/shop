@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">محصولات</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-outline-success btn-sm">افزودن</a>
    </div>

    <div class="row">
        <table class="table table-dark table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">ایدی</th>
                <th scope="col">عکس</th>
                <th scope="col">عنوان</th>
                <th scope="col">قیمت</th>
                <th scope="col">موجودی</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><img src="{{ $product->picture ?  : '/images/default.jpg' }}" alt="product image"
                             style="width: 40px; height: 40px; border-radius: 100px"></td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->inventory }}</td>
                    <td>
                        <div class="w-50 d-flex justify-content-evenly">
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="btn btn-outline-primary btn-sm">ویرایش</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
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
    <div class="d-flex justify-content-center">{{ $products->links() }}</div>
@endsection
