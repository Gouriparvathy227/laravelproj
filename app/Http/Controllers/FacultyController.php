<?php

namespace App\Http\Controllers;

class FacultyController extends Controller
{
    public function index()
    {
        return view('faculty.index');
    }

    public function show(int $id)
    {
        return view('faculty.show', compact('id'));
    }
}
