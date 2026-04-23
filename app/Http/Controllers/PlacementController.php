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
            ['name' => 'HCL', 'domain' => 'hcltech.com'],
            ['name' => 'Accenture', 'domain' => 'accenture.com'],
            ['name' => 'IBM', 'domain' => 'ibm.com'],
            ['name' => 'Cognizant', 'domain' => 'cognizant.com'],
            ['name' => 'Capgemini', 'domain' => 'capgemini.com'],
            ['name' => 'Tech Mahindra', 'domain' => 'techmahindra.com'],
            ['name' => 'Amazon', 'domain' => 'amazon.com'],
            ['name' => 'Google', 'domain' => 'google.com'],
            ['name' => 'Microsoft', 'domain' => 'microsoft.com'],
            ['name' => 'Zoho', 'domain' => 'zoho.com'],
            ['name' => 'UST Global', 'domain' => 'ust.com'],
            ['name' => 'KPMG', 'domain' => 'kpmg.com'],
            ['name' => 'Deloitte', 'domain' => 'deloitte.com'],
            ['name' => 'South Indian Bank', 'domain' => 'southindianbank.com'],
        ];

        return view('placements.index', compact('companies'));
    }
}
