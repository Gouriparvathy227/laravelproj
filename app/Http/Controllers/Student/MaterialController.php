<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        return view('student.materials.index');
    }
}
