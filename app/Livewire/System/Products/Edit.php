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

        // offer type
        if ($this->products['discount_save'] > 0 && $this->products['discount'] > 0) {

            if ($this->products['discount_save'] < $this->products['price']) {
                $this->offer_type = intval(($this->products['discount_save'] * 100) / $this->products['price']);
                /**we offer only 5 to 70 percent, steps of 5, 
                 * as like 5,10,15,20,25,30,35,40,45,50,55,60,65,70
                 * so we check if the offer type is in this range,
                 * and if it is not in this range, we set it to amount
                 */
                if ($this->offer_type < 5 || $this->offer_type > 70 || $this->offer_type % 5 != 0) {
                    $this->offer_type = 'amount';
                }
            } else {
                $this->offer_type = 'amount';
            }
        } else {
            $this->offer_type = 0;
        }
    }

    /**
     * rule for validation of product discount and discount_save
     * if offer_type is amount, then discount_save should be less than price
     * if offer_type is percentage, then discount_save should be less than price
     * and discount should be less than price
     * if offer_type is 0, then discount_save and discount should be 0
     */
    public function rules()
    {
        return [
            'products.name' => "required",
            'products.category_id' => 'required',
            'products.neet_price' => 'required',
            'products.price' => 'required',
            'products.thumbnail' => 'required',

        ];
    }

    public function updated($property)
    {

        // validate all except discount and discount_save
        $this->validate($this->rules());
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
        // $this->products['slug'] = Str::slug($this->products['name']);
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
