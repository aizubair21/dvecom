<?php

namespace App\Livewire\System\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

#[Layout('layouts.app')]
class Index extends Component
{

    #[Url]
    public $status = 'All';
    use WithPagination;
    public function render()
    {
        $query = Products::query();

        if ($this->status !== 'All') {
            $query->where('status', $this->status);
        }

        return view('livewire.system.products.index', [

            'products' => $query->paginate(10)
        ]);
    }
}
