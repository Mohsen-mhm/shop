@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="text-center mt-2 mb-2 d-flex flex-column text-light">
            <h3 class="mb-3">کافی شاپ اشوان</h3>
            <p>با منظره ای رویایی در بالاترین نقطه منطقه ، چشم اندازی زیبا و هوایی دلپذیر از تراس کافه اشوان غروب زیبای
                خورشید که با رنگهای بنفش و نارنجی رنگ آمیزی شده است تا شما را به میهمانی ستاره ها ببریم.</p>
        </div>
        @foreach($products->chunk(3) as $row)
            <div class="row">
                @foreach($row as $product)
                    <div class="col-lg-4 mx-auto mt-5">
                        <div class="card rounded-10 border-0 shadow-lg cd-35 mx-auto mb-5"
                             style="width: 18rem; background-color: #131313;">
                            <div class="card-header border-0 p-1 mb-2 d-flex align-items-center justify-content-center"
                                 style="background-color: #131313;">
                                <img class="card-img bg-transparent rounded-circle mt-2" style="width: 70px"
                                     src="{{ $product->picture ?  : '/images/default.jpg' }}"
                                     alt="product image">
                            </div>
                            <div class="card-body p-4 pt-2 text-center text-light">
                                <h5 class="pb-2 border-bottom border-secondary"><b>{{ $product->title }}</b></h5>
                                <p style="height: 48px" class="pt-2 overflow-hidden border-bottom border-secondary">{{ $product->description }}</p>
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
