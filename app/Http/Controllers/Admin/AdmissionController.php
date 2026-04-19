<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index() { return view('admin.admissions.index'); }
    public function updateStatus(Request $request, int $id) { return back()->with('success', 'Admission status updated.'); }
}
