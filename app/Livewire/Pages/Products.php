<?php

namespace App\Livewire\Pages;

use App\Models\Category as ModelCategory;
use App\Models\Products as ModelsProducts;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

#[layout('layouts.client')]
class Products extends Component
{
    #[URL]
    public $slug, $isDiscount;
    public $categoriesIdList = [];

    public function mount()
    {
        if ($this->slug) {
            $sId = ModelCategory::where('slug', $this->slug)->first();
            // dd($sId);
            array_push($this->categoriesIdList, $sId?->id);
            request()->input('slug', '');
        }

        // array_values()

        // dd($this->categoriesIdList);
    }

    public function render()
    {
        $qry = ModelsProducts::query();
        if ($this->categoriesIdList) {
            $qry->whereIn('category_id', array_map(function ($id) {
                return $id;
            }, $this->categoriesIdList));
        };
        $products = $qry->get();

        return view(
            'livewire.pages.products',
            compact('products')
        );
    }
}
