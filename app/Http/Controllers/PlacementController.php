<?php

namespace App\Http\Controllers;

class PlacementController extends Controller
{
    public function index()
    {
        $logoMap = [
            'TCS' => 'tcs.svg',
            'Infosys' => 'infosys.svg',
            'Wipro' => 'wipro.svg',
            'HCL' => 'hcltech.svg',
            'Accenture' => 'accenture.svg',
            'IBM' => 'ibm.svg',
            'Cognizant' => 'cognizant.svg',
            'Capgemini' => 'capgemini.svg',
            'Tech Mahindra' => 'techmahindra.svg',
            'Amazon' => 'amazon.svg',
            'Google' => 'google.svg',
            'Microsoft' => 'microsoft.svg',
            'Zoho' => 'zoho.svg',
            'UST' => 'ust.svg',
            'KPMG' => 'kpmg.svg',
            'Deloitte' => 'deloitte.svg',
            'Mphasis' => 'mphasis.svg',
            'L&T' => 'lt.svg',
            'HDFC' => 'hdfc.svg',
            'South Indian Bank' => 'southindianbank.svg',
        ];

        $companies = collect([
            ['name' => 'TCS', 'domain' => 'tcs.com'],
            ['name' => 'Infosys', 'domain' => 'infosys.com'],
            ['name' => 'Wipro', 'domain' => 'wipro.com'],
            ['name' => 'HCL', 'domain' => 'hcltech.com'],
            ['name' => 'Accenture', 'domain' => 'accenture.com'],
            ['name' => 'IBM', 'domain' => 'ibm.com'],
            ['name' => 'Cognizant', 'domain' => 'cognizant.com'],
            ['name' => 'Capgemini', 'domain' => 'capgemini.com'],
            ['name' => 'Tech Mahindra', 'domain' => 'techmahindra.com'],
            ['name' => 'Amazon', 'domain' => 'amazon.in'],
            ['name' => 'Google', 'domain' => 'google.com'],
            ['name' => 'Microsoft', 'domain' => 'microsoft.com'],
            ['name' => 'Zoho', 'domain' => 'zoho.com'],
            ['name' => 'UST', 'domain' => 'ust.com'],
            ['name' => 'KPMG', 'domain' => 'kpmg.com'],
            ['name' => 'Deloitte', 'domain' => 'deloitte.com'],
            ['name' => 'Mphasis', 'domain' => 'mphasis.com'],
            ['name' => 'L&T', 'domain' => 'larsentoubro.com'],
            ['name' => 'HDFC', 'domain' => 'hdfcbank.com'],
        ])->map(function (array $company) use ($logoMap): array {
            $company['logo'] = $logoMap[$company['name']] ?? 'placeholder.svg';

            return $company;
        })->all();

        $stats = [
            'recruiters' => count($companies),
            'placed' => 500,
            'highest_pkg' => '12 LPA',
            'avg_pkg' => '4.5 LPA',
        ];

        return view('placements.index', compact('companies', 'stats'));
    }
}
