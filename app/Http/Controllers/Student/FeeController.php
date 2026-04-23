<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class FeeController extends Controller
{
    public function index()
    {
        return view('student.fees.index');
    }
}
