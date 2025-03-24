<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Templates extends Component
{
    public function render()
    {
        return view('livewire.page.templates')->layout('layouts.home');
    }
}
