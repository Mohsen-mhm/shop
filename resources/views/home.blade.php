@extends('layouts.master')

@section('content')

    <div class="container">
        @foreach($products->chunk(3) as $row)
            <div class="row">
                <div class="text-center mt-2 mb-2 d-flex flex-column text-light">
                    <h3 class="mb-3">لورم ایپسوم</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                        درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این
                        صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و
                        زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                        اساسا مورد استفاده قرار گیرد.</p>
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
        <div class="text-center mt-2 mb-2 d-flex flex-column text-light">
            <h3 class="mb-3">لورم ایپسوم</h3>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و
                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و
                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده،
                شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و
                دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای
                اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        </div>
    </div>
@endsection
