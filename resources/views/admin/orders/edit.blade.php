@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">ویرایش سفارش</h1>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-info btn-sm">بازگشت</a>
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
        <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row mt-4">
                <div class="col-6">
                    <label for="price" class="form-label text-light">قیمت سفارش (تومان):</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror text-light" style="background: #1e2125" id="price"
                           name="price" value="{{ old('price', $order->price) }}" autofocus required>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="picture" class="form-label text-light">وضعیت سفارش:</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror text-light" style="background: #1e2125">
                        @foreach(config('orderStatuses') as $key => $value)
                            <option value="{{ $key }}" @if($key == $order->status) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label for="trackingS" class="form-label text-light">کد رهگیری پستی:</label>
                    <input type="text" class="form-control @error('trackingS') is-invalid @enderror text-light" style="background: #1e2125" id="trackingS"
                           name="tracking_serial" value="{{ old('trackingS', $order->tracking_serial ? $order->tracking_serial : '' ) }}" autofocus>
                    @error('trackingS')
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
