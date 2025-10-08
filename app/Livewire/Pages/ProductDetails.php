<?php

namespace App\Livewire\Pages;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[layout('layouts.client')]
class ProductDetails extends Component
{
    // #[Title('Product Details')]
    // #[Url('/product-details', slug: 'product.details')]
    #[URL]
    public $slug;
    public $related = [];

    public function getRelatedProducts()
    {
        $this->related = Products::where(function ($q) {
            $q->where('category_id', Products::select('category_id')->where('slug', $this->slug)->first('category_id')->category_id)
                ->whereNot('slug', $this->slug)->live();
        })->get();
        // dd($this->related);
    }

    public function render()
    {
        return view(
            'livewire.pages.product-details',
            [
                'product' => Products::where('slug', $this->slug)->with('category')->first(),
            ]
        );
    }
}
