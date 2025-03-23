<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Pages extends Component
{
    public function render()
    {
        return view('livewire.page.pages')->layout('layouts.home');
    }
}
