<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersManagement extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Menu::class);
        return view('admin.page.users-management');
    }
}
