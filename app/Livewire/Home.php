<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.client')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'products' => \App\Models\Products::query()->live()->get()
        ]);
    }
}
