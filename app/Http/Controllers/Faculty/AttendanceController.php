<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('faculty.attendance.index');
    }

    public function store(Request $request)
    {
        return back()->with('success', 'Attendance saved.');
    }
}
