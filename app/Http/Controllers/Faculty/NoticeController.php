<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function create()
    {
        return view('faculty.notices.create');
    }

    public function store(Request $request)
    {
        return back()->with('success', 'Notice posted.');
    }
}
