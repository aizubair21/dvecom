<?php

namespace App\Livewire\System\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;


#[layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    #[URL]
    public $id, $auth = false, $status = "Pending", $created = 'All', $sd, $ed, $selectedRow = [];

    public function mount()
    {
        $this->sd = today();
        $this->ed = today();
    }

    public function render()
    {
        $q = Order::query();

        /**
         * order type auth or not
         */
        if ($this->auth) {
            $q->auth();
        } else {
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
