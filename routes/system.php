<?php

use App\Livewire\System\Carousel\Index as carouselIndex;
use App\Livewire\System\Carousel\Slides as carouselSlides;

use App\Livewire\System\Order\Index as orderIndex;
use App\Livewire\System\Order\View as orderView;

use App\Livewire\System\Products\Edit as productEdit;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    /**
     * category
     */
    Route::get('/category/index', \App\Livewire\System\Category\Index::class)->name('category.index');
    Route::get('/category/add', \App\Livewire\System\Category\Create::class)->name('category.create');

    /**
     * products
     */
    Route::get('/products/index', \App\Livewire\System\Products\Index::class)->name('products.index');
    Route::get('/products/add', \App\Livewire\System\Products\Create::class)->name('products.create');
    Route::get('/products/{id}', productEdit::class)->name('products.edit');


    /**
     * order
     */
    Route::get('/order', orderIndex::class)->name('order.index');
    Route::get('/order/{id}', orderView::class)->name('order.view');


    /**
     * carousel 
     */
    Route::get('/carousels', carouselIndex::class)->name('carousel.index');
    Route::get('/carousel/{id}/slides', carouselSlides::class)->name('carousel.slides');
});
