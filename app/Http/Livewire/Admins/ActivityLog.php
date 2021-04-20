<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;

class ActivityLog extends Component
{
    public function render()
    {
        return view('livewire.admins.activity-log')->layout('layouts.admin');
    }
}
