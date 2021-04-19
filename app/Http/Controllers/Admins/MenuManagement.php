<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuManagement extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Menu::class);
        return view('menu-management');
    }
}
