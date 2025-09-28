<?php

namespace App\Livewire\System\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.system.products.index', [
            'products' => Products::paginate(10)
        ]);
    }
}
