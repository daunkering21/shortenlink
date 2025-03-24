<?php

namespace App\Livewire\Page;

use Livewire\Component;

class CookiePolicy extends Component
{
    public function render()
    {
        return view('livewire.page.cookie-policy')->layout('layouts.home');
    }
}
