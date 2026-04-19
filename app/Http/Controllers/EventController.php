<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index');
    }

    public function show(int $id)
    {
        return view('events.show', compact('id'));
    }
}
