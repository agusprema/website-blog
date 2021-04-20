<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ContentWriter extends Component
{
    public function render()
    {
        return view('livewire.user.content-writer')->layout('layouts.home-navbar');
    }
}
