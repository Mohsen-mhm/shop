@extends('layouts.master')

@section('content')

    <div class="container">
        @foreach($products->chunk(3) as $row)
            @php
                $index = array_rand($array);
            @endphp
            <div class="row">
                <div class="text-center mt-2 mb-2 d-flex flex-column text-light">
                    <h3 class="mb-3">{{ $array[$index]['title'] }}</h3>
                    <p>{{ $array[$index]['body'] }}</p>
                </div>
                @foreach($row as $product)
                    <div class="col-lg-4 mx-auto">
                        <div class="card rounded-10 border-0 shadow-lg cd-35 mx-auto mb-5"
                             style="width: 18rem; background-color: #131313;">
                            <div class="card-header border-0 p-1 mb-2 d-flex align-items-center justify-content-center"
                                 style="background-color: #131313;">
                                <img class="card-img bg-transparent rounded-circle mt-2" style="width: 80px"
                                     src="{{ $product->picture ?  : '/images/default.jpg' }}"
                                     alt="product image">
                            </div>
                            <div class="card-body p-4 pt-2 text-center text-light">
                                <h5 class="pb-2">{{ $product->title }}</h5>
                                <p style="height: 48px" class="overflow-hidden">{{ $product->description }}</p>
                                <div class="d-flex justify-content-around">
                                    <p>قیمت:</p>
                                    <b>{{ $product->price }}</b>
                                </div>
                                <form action="{{ route('addToCart', $product->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning">افزودن به سبد</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
