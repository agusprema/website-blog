<?php

namespace App\View\Components\Admins\NavbarItems;

use Illuminate\View\Component;
use App\Models\Menu;

class dropdown extends Component
{
    public $submenus;
    public $menus;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($submenus)
    {
        $this->submenus = $submenus;
        $this->menus = Menu::where('menu_active', 1)->orderBy('sort_id', 'asc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admins.navbar-items.dropdown');
    }
}
