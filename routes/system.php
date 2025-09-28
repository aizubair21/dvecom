<?php

use Illuminate\Support\Facades\Route;


Route::get('/system/products', \App\Livewire\System\Products\Index::class)->name('products.index');
