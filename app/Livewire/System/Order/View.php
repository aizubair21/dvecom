<?php

namespace App\Livewire\System\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[layout('layouts.app')]
class View extends Component
{
    #[URL]
    public $id;

    public function mount()
    {
        // dd(Order::findOrFail($this->id));
    }
    public function render()
    {
        return view(
            'livewire.system.order.view',
            [
                "order" => Order::findOrFail($this->id)
            ]
        );
    }
}
