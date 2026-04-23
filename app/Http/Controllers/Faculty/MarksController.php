<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function index()
    {
        return view('faculty.marks.index');
    }

    public function store(Request $request)
    {
        return back()->with('success', 'Marks submitted.');
    }
}
