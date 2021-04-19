<?php

namespace App\View\Components\Admins;

use Illuminate\View\Component;
use App\Models\Menu;

class Navbar extends Component
{
    public $menus;
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menus = Menu::tree();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admins.navbar-admin');
    }
}
