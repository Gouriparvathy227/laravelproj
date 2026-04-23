<?php

namespace App\Http\Controllers;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('departments.index');
    }

    public function show(string $slug)
    {
        return view('departments.show', compact('slug'));
    }
}
