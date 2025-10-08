<?php

namespace App\Livewire\System\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Masmerise\Toaster\Toaster;

#[layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    #[URL]
    public $user = 'guest', $status = "Pending", $created = 'all', $sd, $ed;
    public $selectedRow = [];

    public function mount()
    {
        $this->sd = today();
        $this->ed = today();
    }

    public function deleteOrder($orderId)
    {
        try {
            $order = Order::find($orderId);
            $order->forceDelete();
            Toaster::success('Order deleted successfully.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            Toaster::success('Not Deleted.');
        }
    }

    public function render()
    {
        $q = Order::query();

        /**
         * order type auth or not
         */
        if ($this->user == 'auth') {
            $q->auth();
        } elseif ($this->user == 'guest') {
            $q->guest();
        }


        /**
         * order status
         */
        $q->where('status', $this->status);


        /**
         * created at
         */
        // $q->whereDate('created_at', [$this->sd, Carbon::parse($this->ed)->endOfDay()]);

        // switch ($this->created) {
        //     case 'Today':
        //         $q->whereDdate('created_at', today());
        //         break;

        //     case 'Between':
        //         break;

        //     default:
        //         # code...
        //         $q->whereDdate('created_at', today());
        //         break;
        // }
        if ($this->created == 'day') {
            $q->whereDate('created_at', carbon::parse($this->sd)->endOfDay());
        } elseif ($this->created == 'between') {
            $q->whereBetween('created_at', [carbon::parse($this->sd)->endOfDay(), Carbon::parse($this->ed)->endOfDay()]);
        }

        return view(
            'livewire.system.order.index',
            [
                'orders' => $q->paginate(50),
            ]
        );
    }
}
