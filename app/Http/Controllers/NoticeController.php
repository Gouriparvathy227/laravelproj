<?php

namespace App\Http\Controllers;

class NoticeController extends Controller
{
    public function index()
    {
        return view('notices.index');
    }

    public function show(int $id)
    {
        return view('notices.show', compact('id'));
    }
}
