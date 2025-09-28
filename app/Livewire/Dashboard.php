<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[layout('layouts.app')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
