<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function placements() { return response()->json(['message' => 'Placements report endpoint']); }
    public function admissions() { return response()->json(['message' => 'Admissions report endpoint']); }
}
