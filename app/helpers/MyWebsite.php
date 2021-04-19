<?php

namespace app\helpers;

class MyWebsite
{
    public function theme()
    {
        $theme = '';
        if (isset($_COOKIE['theme'])) {
            if ($_COOKIE['theme'] == 'dark') {
                $theme = 'dark';
            }
        }
        return $theme;
    }
}
