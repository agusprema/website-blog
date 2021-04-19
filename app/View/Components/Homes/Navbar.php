<?php

namespace App\View\Components\Homes;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $theme;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.homes.navbar-home');
    }
}
