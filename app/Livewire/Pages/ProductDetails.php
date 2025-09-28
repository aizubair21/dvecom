<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[layout('layouts.client')]
class ProductDetails extends Component
{
    public $counter = 561;

    public function increment()
    {
        $this->counter++;
    }
    public function render()
    {
        return view('livewire.pages.product-details');
    }
}
