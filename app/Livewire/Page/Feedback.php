<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Feedback extends Component
{
    public function render()
    {
        return view('livewire.page.feedback')->layout('layouts.home');
    }
}
