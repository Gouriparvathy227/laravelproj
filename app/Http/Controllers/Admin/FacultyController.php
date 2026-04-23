<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index() { return view('admin.faculty.index'); }
    public function store(Request $request) { return back()->with('success', 'Faculty saved.'); }
}
