<?php

namespace App\Livewire\System\Products;

use App\hangleImageUpload;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
class Create extends Component
{

    use hangleImageUpload, WithPagination, WithFileUploads;

    public $name;
    public $category_id;
    public $short_description;
    public $description;
    public $neet_price;
    public $price;
    public $discount;
    public $discount_save;
    public $stock;
    public $status = 'Active';
    public $thumbnail;
    public $in_stock = true;

    public $seo_title, $seo_description, $seo_keywords, $seo_thumbnail, $seo_tags;
    public $display_at_home = false, $recommended = false;
    public $cod = false, $courier = false, $hand = false;
    public $accept_cupon = false;
    public $badge, $tags;
    public $is_gallery = false;
    public $shipping_note;

    public $categories, $otherImages = [], $offer_type;

    public function updated($property)
    {

        if ($this->offer_type > 0 && $this->offer_type != 'amount') {
            $this->discount_save = intval(($this->price * $this->offer_type) / 100);
        }

        if ($this->discount_save) {
            $this->discount = intval($this->price) - intval($this->discount_save);
        } else {
            $this->discount = 0;
        }

        if (!$this->offer_type) {
            $this->discount = 0;
            $this->discount_save = 0;
        }

        if (!$this->in_stock) {
            $this->stock = 0;
        }
    }

    #[On('category-created')]
    public function mount()
    {
        $this->categories = \App\Models\Category::orderBy('name')->get();
        $this->dispatch('close-modal', 'add-category-modal');
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|integer|exists:categories,id',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'neet_price' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0',
        'discount_type' => 'nullable|in:amount,percent',
        'stock' => 'required|integer|min:0',
        'status' => 'required|in:Active,Inactive',
        'thumbnail' => 'required|image|max:1024',

        'seo_title' => 'nullable|string|max:255',
        'seo_description' => 'nullable|string|max:500',
        'seo_keywords' => 'nullable|string|max:255',
        'seo_thumbnail' => 'nullable|image|max:2048',
        'seo_tags' => 'nullable|string|max:255',

        'display_at_home' => 'boolean',
        'recommended' => 'boolean',

        'cod' => 'boolean',
        'courier' => 'boolean',
        'hand' => 'boolean',

        'accept_cupon' => 'nullable|boolean',
        'badge' => 'nullable|string|max:100',
        'tags' => 'nullable|string|max:255',

        'is_gallery' => 'boolean',
        'shipping_note' => 'nullable|string|max:500',
    ];

    public function submit()
    {
        $this->validate();

        $product = new \App\Models\Products();
        $product->name = $this->name;
        $product->category_id = $this->category_id;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->neet_price = $this->neet_price;
        $product->price = $this->price;
        $product->discount = $this->discount;
        $product->discount_type = $this->discount_type;
        $product->stock = $this->stock;
        $product->status = $this->status;

        if ($this->thumbnail) {
            $product->thumbnail = $this->handleImageUpload($this->thumbnail, 'products/thumbnails');
        }

        $product->seo_title = $this->seo_title;
        $product->seo_description = $this->seo_description;
        $product->seo_keywords = $this->seo_keywords;

        if ($this->seo_thumbnail) {
            $product->seo_thumbnail = $this->handleImageUpload($this->seo_thumbnail, 'products/seo_thumbnails');
        }

        $product->seo_tags = $this->seo_tags;
        $product->display_at_home = $this->display_at_home;
        $product->recommended = $this->recommended;
        $product->cod = $this->cod;
        $product->courier = $this->courier;
        $product->hand = $this->hand;
        $product->accept_cupon = $this->accept_cupon;
        $product->badge = $this->badge;
        $product->tags = $this->tags;
        $product->is_gallery = $this->is_gallery;
        $product->shipping_note = $this->shipping_note;

        $product->save();

        session()->flash('message', 'Product created successfully.');

        return redirect()->route('system.products.index');
    }

    public function render()
    {
        return view('livewire.system.products.create');
    }
}
