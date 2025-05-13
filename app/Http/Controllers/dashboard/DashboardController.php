<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function showProfile()
    {
        return view('admin.profile');
    }
}
