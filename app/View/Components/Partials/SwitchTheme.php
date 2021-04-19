<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class SwitchTheme extends Component
{
    public $theme;

    public function __construct(Request $request)
    {
        $this->theme = 'light';
        if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark') {
            $this->theme = 'dark';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.partials.switch-theme');
    }
}
