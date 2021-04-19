<?php

namespace App\View\Components\Admins\NavbarItems;

use Illuminate\View\Component;

class basic extends Component
{
    public $submenus;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($submenus)
    {
        $this->submenus = $submenus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admins.navbar-items.basic');
    }
}
