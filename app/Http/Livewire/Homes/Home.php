<?php

namespace App\Http\Livewire\Homes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    public function render()
    {
        return view('livewire.homes.home', [
            'dummydata' => DB::table('dummy_data')->paginate(12)
        ])->layout('layouts.home');
    }
}
