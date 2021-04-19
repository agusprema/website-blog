<?php

namespace App\View\Components\Homes;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class MiniContent extends Component
{
    public $dummydata;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dummydata = DB::table('dummy_data')->paginate(3);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.homes.mini-content-home');
    }
}
