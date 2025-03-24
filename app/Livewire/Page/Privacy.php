<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Privacy extends Component
{
    public function render()
    {
        return view('livewire.page.privacy')->layout('layouts.home');
    }
}
