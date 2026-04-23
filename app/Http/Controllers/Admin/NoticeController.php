<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index() { return view('admin.notices.index'); }
    public function store(Request $request) { return back()->with('success', 'Notice saved.'); }
    public function destroy(int $id) { return back()->with('success', 'Notice removed.'); }
}
