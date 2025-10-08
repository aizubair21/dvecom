<?php

namespace App\Livewire\Pages;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Masmerise\Toaster\Toaster;

#[layout('layouts.client')]
class SingleOrder extends Component
{
    #[URL]
    public $slug;

    public $products, $qty = 1, $order_type = 'Guest', $subTotal, $total, $isCupon = false, $attribute;

    public function mount()
    {
        // dd(redirect()->back());
        if (Auth::check()) {
            $this->order_type = 'Auth';
        }
        $this->products = Products::where('slug', $this->slug)->first();
        // dd($this->products->total);

        $this->sumeSubtotal();
    }

    public function sumeSubtotal()
    {
        $this->subTotal = $this->qty * $this->products->total;
        $this->total = $this->subTotal;
    }

    public function increaseQty()
    {
        $this->qty++;
        if ($this->qty > $this->products->stock) {
            $this->qty = $this->products->stock;
            Toaster::warning('Maximum Quantity Reached !');
        };
        $this->sumeSubtotal();
    }

    public function decreaseQty()
    {
        $this->qty--;
        if ($this->qty < 1) {
            $this->qty = 1;
            Toaster::warning('Required Minimum Item !');
        }
        $this->sumeSubtotal();
    }

    public function render()
    {
        return view(
            'livewire.pages.single-order',
        );
    }
}
