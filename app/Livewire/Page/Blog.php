<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.page.blog')->layout('layouts.home');
    }
}
