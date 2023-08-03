@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-light">سفارشات</h1>
    </div>

    <div class="row">
        <table class="table table-dark table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">ایدی</th>
                <th scope="col">نام سفارش دهنده</th>
                <th scope="col">قیمت</th>
                <th scope="col">وضعیت</th>
                <th scope="col">کد رهگیری پستی</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->price }} تومان</td>
                    <td>
                        @switch($order->status)
                            @case('unpaid')
                                <p class="badge badge-light badge-pill">پرداخت نشده</p>
                                @break
                            @case('paid')
                                <p class="badge badge-success badge-pill">پرداخت شده</p>
                                @break
                            @case('preparation')
                                <p class="badge badge-warning badge-pill">در حال آماده سازی</p>
                                @break
                            @case('posted')
                                <p class="badge badge-primary badge-pill">ارسال شده</p>
                                @break
                            @case('received')
                                <p class="badge badge-info badge-pill">دریافت شده</p>
                                @break
                            @case('canceled')
                                <p class="badge badge-danger badge-pill">لغو شده</p>
                                @break
                        @endswitch
                    </td>
                    <td>
                        @if($order->tracking_serial)
                            {{ $order->tracking_serial }}
                        @else
                            ثبت نشده
                        @endif
                    </td>
                    <td>
                        <div class="w-50 d-flex justify-content-evenly">
                            <a href="{{ route('admin.orders.edit', $order->id) }}"
                               class="btn btn-outline-primary btn-sm">ویرایش</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post">
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
    <div class="d-flex justify-content-center">{{ $orders->links() }}</div>
@endsection
