<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[layout('layouts.client')]
class SingleOrder extends Component
{
    public function render()
    {
        return view('livewire.pages.single-order');
    }
}
