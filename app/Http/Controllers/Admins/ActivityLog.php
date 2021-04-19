<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityLog extends Controller
{
    public function index()
    {
        return view('admin.page.activitylog');
    }
}
