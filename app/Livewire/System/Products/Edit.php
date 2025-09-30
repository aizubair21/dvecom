<?php

namespace App\Livewire\System\Products;

use App\hangleImageUpload;
use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toast;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Str;
use Livewire\Attributes\On;


#[layout('layouts.app')]
class Edit extends Component
{
    use hangleImageUpload, WithFileUploads;

    #[URL]
    public $id;

    public $data, $products = [], $newThumbnail, $newShowcase = [], $categories, $in_stock = true, $offer_type;

    // refresh
    protected $listeners = ['refresh' => '$refresh'];

    #[On('refresh')]
    public function mount()
    {
        $this->data = Products::find($this->id);
        $this->products = $this->data->toArray();

        $this->categories = Category::all();
        if (empty($this->products)) {
            $this->redirectRoute('system.products.index', true);
        }
        if ($this->products['stock'] <= 0) {
            $this->in_stock = false;
        }
    }

    public function updated()
    {
        //
        $this->validate(
            [
                'products.name' => "required",
                'products.category_id' => 'required',
                'products.neet_price' => 'required',
                'products.price' => 'required',
                'products.thumbnail' => 'required',

            ]
        );
        if ($this->offer_type > 0 && $this->offer_type != 'amount') {
            $this->products['discount_save'] = intval(($this->products['price'] * $this->offer_type) / 100);
        }

        if ($this->products['discount_save']) {
            $this->products['discount'] = intval($this->products['price']) - intval($this->products['discount_save']);
        } else {
            $this->products['discount'] = 0;
        }

        if (!$this->offer_type) {
            $this->products['discount'] = 0;
            $this->products['discount_save'] = 0;
        }

        if (!$this->in_stock) {
            $this->products['stock'] = 0;
        }
    }


    public function updateProduct()
    {
        $this->products['slug'] = Str::slug($this->products['name']);
        if ($this->newThumbnail) {
            $this->products['thumbnail'] = $this->handleImageUpload($this->newThumbnail, $this->products['name'], 'products', $this->products['thumbnail']);
        }
        $product = Products::findOrFail($this->id);
        if ($product) {
            $product->update($this->products);
            Toaster::success('Updated !');
        } else {
            Toaster::error('Have an erro. See log file !');
        }
    }

    public function updateStatus($status)
    {
        // Toaster::error('Have an erro. See log file !');

        $product = Products::findOrFail($this->id);
        if ($product) {
            $product->update(['status' => $status]);
            Toaster::success("Updated to $status");
            $this->dispatch('refresh');
        } else {
            Toaster::error("Can't Update !");
        }
    }


    public function render()
    {
        return view('livewire.system.products.edit');
    }
}
