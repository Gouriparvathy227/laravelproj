<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('student.services.index');
    }

    public function requestTC(Request $request)
    {
        return back()->with('success', 'TC request submitted.');
    }
}
