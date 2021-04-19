<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class IconsInput extends Component
{
    public $model;
    public $typemodel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $model, string $typemodel = 'basic')
    {
        $this->model = $model;
        $this->typemodel = $typemodel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modals.icons-input');
    }
}
