<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class Container extends Component
{
    public $title;
    public $entangle = 'added';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $entangle)
    {
        $this->title = $title;
        $this->entangle = $entangle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modals.container');
    }
}
