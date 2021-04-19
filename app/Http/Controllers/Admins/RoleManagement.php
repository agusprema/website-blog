<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManagement extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.page.role-management')->with(['roles' => $roles]);
    }
}
