<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Features extends Component
{
    public function render()
    {
        return view('livewire.page.features')->layout('layouts.home');
    }
}
