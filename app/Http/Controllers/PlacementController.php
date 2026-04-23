<?php

namespace App\Http\Controllers;

class PlacementController extends Controller
{
    public function index()
    {
        $companies = [
            ['name' => 'TCS', 'logo' => 'tcs.svg'],
            ['name' => 'Infosys', 'logo' => 'infosys.svg'],
            ['name' => 'Wipro', 'logo' => 'wipro.svg'],
            ['name' => 'HCL', 'logo' => 'hcltech.svg'],
            ['name' => 'Cognizant', 'logo' => 'cognizant.svg'],
            ['name' => 'Capgemini', 'logo' => 'capgemini.svg'],
            ['name' => 'Deloitte', 'logo' => 'deloitte.svg'],
            ['name' => 'South Indian Bank', 'logo' => 'southindianbank.svg'],
        ];

        return view('placements.index', compact('companies'));
    }
}
