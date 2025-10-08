<?php

namespace App\Livewire\Pages;

use App\Models\Order;
use App\Models\Order_has_items;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public $name, $email, $phone, $district, $thana, $village, $address, $zip;

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

    public function confirmOrder()
    {
        try {
            $this->validate(
                [
                    'phone' => ['required'],
                    'name' => ['required'],
                    'address' => ['required'],
                ]
            );

            DB::transaction(function () {

                /**
                 * create order
                 */
                $order = new Order();
                $order->name = $this->name;
                $order->email = $this->email;
                $order->phone = $this->phone;
                $order->district = $this->district;
                $order->thana = $this->thana;
                $order->village = $this->village;
                $order->address = $this->address;
                $order->zip = $this->zip;
                $order->total = $this->total;
                $order->auth = Auth::check() ? true : false;
                $order->user_id = Auth::check() ? auth()->user()->id : '';
                $order->status = "Pending";
                $order->save();


                /**
                 * create order items
                 */
                Order_has_items::create(
                    [
                        'order_id' => $order->id,
                        'product_id' => $this->products->id,
                        'qty' => $this->qty,
                        'neet_price' => $this->products->neet_price,
                        'price' => $this->products->price,
                        'total' => $this->total,
                        'discount' => $this->products->hasDiscount(),
                    ]
                );
            });
            Toaster::success('Order Placed !');
        } catch (\Throwable $th) {
            //throw $th;
            Log::notice($th->getMessage());
            Toaster::error('Have an error');
        }
    }

    public function render()
    {
        return view(
            'livewire.pages.single-order',
        );
    }
}
