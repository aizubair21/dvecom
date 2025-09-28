<?php

use Illuminate\Support\Facades\Route;


Route::get('/products/view', \App\Livewire\System\Products\Index::class)->name('products.index');
Route::get('/products/add', \App\Livewire\System\Products\Create::class)->name('products.create');
Route::get('/category/view', \App\Livewire\System\Category\Index::class)->name('category.index');
Route::get('/category/add', \App\Livewire\System\Category\Create::class)->name('category.create');
