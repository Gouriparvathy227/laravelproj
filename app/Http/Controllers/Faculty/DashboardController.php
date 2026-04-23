<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('faculty.dashboard');
    }
}
