<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function index()
    {
        return view('student.results.index');
    }
}
