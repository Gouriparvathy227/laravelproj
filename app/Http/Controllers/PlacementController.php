<?php

namespace App\Http\Controllers;

class PlacementController extends Controller
{
    public function index()
    {
        $companies = [
            ['name' => 'TCS', 'domain' => 'tcs.com'],
            ['name' => 'Infosys', 'domain' => 'infosys.com'],
            ['name' => 'Wipro', 'domain' => 'wipro.com'],
            ['name' => 'Cognizant', 'domain' => 'cognizant.com'],
            ['name' => 'HCL Technologies', 'domain' => 'hcltech.com'],
            ['name' => 'Deloitte', 'domain' => 'deloitte.com'],
            ['name' => 'Capgemini', 'domain' => 'capgemini.com'],
            ['name' => 'South Indian Bank', 'domain' => 'southindianbank.com'],
        ];

        return view('placements.index', compact('companies'));
    }
}
