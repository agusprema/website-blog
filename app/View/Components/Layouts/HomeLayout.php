<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class HomeLayout extends Component
{
    public $theme;

    public function __construct(Request $request)
    {
        $th = 'light';
        if (isset($_COOKIE['theme'])) {
            if ($_COOKIE['theme'] == 'light') {
                $th = 'light';
            } else {
                $th = 'dark';
            }
        }
        $this->theme = $th;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.home');
    }
}
