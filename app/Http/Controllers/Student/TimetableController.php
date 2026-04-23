<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class TimetableController extends Controller
{
    public function index()
    {
        return view('student.timetable.index');
    }
}
