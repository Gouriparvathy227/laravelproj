<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function history()
    {
        return view('history');
    }

    public function facilities()
    {
        return view('facilities');
    }
}
