<?php

use App\Livewire\Dashboard;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\ProductDetails;
use App\Livewire\Pages\Products;
use App\Livewire\Pages\SingleOrder;

Route::get('/', Home::class)->name('home');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// prodcut details 
Route::get('/product/{slug}', ProductDetails::class)->name('product.details');

//single product order 
Route::get('/product/{slug}/order', SingleOrder::class)->name('product.order');

// product
Route::get('/products', Products::class)->name('products');

// category products
Route::get('{slug}/products', Products::class)->name('category.products');

require __DIR__ . '/auth.php';
