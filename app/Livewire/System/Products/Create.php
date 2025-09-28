<?php

namespace App\Livewire\System\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.system.products.create');
    }
}
