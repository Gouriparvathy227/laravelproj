<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function index() { return view('admin.placements.index'); }
    public function store(Request $request) { return back()->with('success', 'Placement record saved.'); }
}
