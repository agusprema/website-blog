<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admins.dashboard')->layout('layouts.admin');
    }
}
