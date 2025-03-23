<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.page.register')->layout('layouts.auth');
    }
}
