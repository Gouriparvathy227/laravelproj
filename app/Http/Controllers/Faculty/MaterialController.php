<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return view('faculty.materials.index');
    }

    public function store(Request $request)
    {
        return back()->with('success', 'Material uploaded.');
    }

    public function destroy(int $id)
    {
        return back()->with('success', 'Material deleted.');
    }
}
