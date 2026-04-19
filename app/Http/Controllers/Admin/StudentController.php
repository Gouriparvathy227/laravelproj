<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() { return view('admin.students.index'); }
    public function create() { return view('admin.students.create'); }
    public function store(Request $request) { return back()->with('success', 'Student created.'); }
    public function edit(int $id) { return view('admin.students.edit', compact('id')); }
    public function update(Request $request, int $id) { return back()->with('success', 'Student updated.'); }
}
