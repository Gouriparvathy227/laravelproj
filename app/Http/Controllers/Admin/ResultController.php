<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function import(Request $request) { return back()->with('success', 'Results imported.'); }
    public function publish(Request $request, int $id) { return back()->with('success', 'Result publication updated.'); }
}
