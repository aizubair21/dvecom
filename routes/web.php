<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\ProductDetails;
use App\Livewire\Pages\SingleOrder;

Route::view('/', 'welcome')->name('home');

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


require __DIR__ . '/auth.php';
