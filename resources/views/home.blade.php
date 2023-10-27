@extends('layouts.master')

@section('content')

    <div class="container">
        @php
            $array = [
                [
                    'title' => "منظره",
                    'body' => "با منظره ای رویایی در بالاترین نقطه منطقه ، چشم اندازی زیبا و هوایی دلپذیر از تراس کافه اشوان غروب زیبای خورشید که با رنگهای بنفش و نارنجی رنگ آمیزی شده است تا شما را به میهمانی ستاره ها ببریم."
                ],[
                    'title' => "فضا",
                    'body' => "فضای مناسب برای دیدار های دوستانه ،قرارهای کاری و لحظات خاطره انگیز برای تمام فصول سال با تهویه مناسب و نور کافی ، فضایی برای تمام سلیقه ها."
                ],
                [
                    'title' => "لحظات",
                    'body' => "لحضات زیبای خود را با ما در کافه اشوان تجربه کنید و به دوستان نیز کافه اشوان را پیشنهاد دهید."
                ],[
                    'title' => "کیفیت",
                    'body' => "ما در کافه اشوان با استفاده از بهترین و تازه ترین مواد اولیه و کادری مجرب همه روزه در خدمت مشتریان عزیز هستیم ."
                ]
            ];
            $index = array_rand($array);
        @endphp
        @foreach($products->chunk(3) as $row)
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
