<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        $array = [
            [
                'title' => "منظره",
                'body' => "با منظره ای رویایی در بالاترین نقطه منطقه ، چشم اندازی زیبا و هوایی دلپذیر از تراس کافه اشوان غروب زیبای خورشید که با رنگهای بنفش و نارنجی رنگ آمیزی شده است تا شما را به میهمانی ستاره ها ببریم."
            ], [
                'title' => "فضا",
                'body' => "فضای مناسب برای دیدار های دوستانه ،قرارهای کاری و لحظات خاطره انگیز برای تمام فصول سال با تهویه مناسب و نور کافی ، فضایی برای تمام سلیقه ها."
            ],
            [
                'title' => "لحظات",
                'body' => "لحضات زیبای خود را با ما در کافه اشوان تجربه کنید و به دوستان نیز کافه اشوان را پیشنهاد دهید."
            ], [
                'title' => "کیفیت",
                'body' => "ما در کافه اشوان با استفاده از بهترین و تازه ترین مواد اولیه و کادری مجرب همه روزه در خدمت مشتریان عزیز هستیم ."
            ]
        ];

        return view('home', compact(['products', 'array']));
    }
}
