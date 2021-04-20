<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;

class UserManagement extends Component
{
    public function render()
    {
        return view('livewire.admins.user-management')->layout('layouts.admin');
    }
}
