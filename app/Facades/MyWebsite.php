<?php

namespace App\Facades;

class MyWebsite extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'mywebsite';
    }
}
