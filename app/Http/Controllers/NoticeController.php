<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $allNotices = [
            [
                'category' => 'exam',
                'published' => '13 Apr 2026',
                'title' => 'Semester VI Model Examination Timetable',
                'body' => 'Timetable and exam room details are now available for all final semester students.',
            ],
            [
                'category' => 'admission',
                'published' => '11 Apr 2026',
                'title' => 'UG/PG Admission Portal Open',
                'body' => 'CAP-linked online application process is active for 2026 intake.',
            ],
            [
                'category' => 'scholarship',
                'published' => '09 Apr 2026',
                'title' => 'Chief Minister Scholarship Verification',
                'body' => 'Eligible students should complete document verification before 20 April.',
            ],
            [
                'category' => 'event',
                'published' => '08 Apr 2026',
                'title' => 'Arts Gala 2026 Registration',
                'body' => 'Department-level registrations open for music, theatre, and fine arts events.',
            ],
            [
                'category' => 'general',
                'published' => '07 Apr 2026',
                'title' => 'Campus Closed for Maintenance',
                'body' => 'Selected blocks will be closed this weekend for electrical maintenance.',
            ],
            [
                'category' => 'event',
                'published' => '05 Apr 2026',
                'title' => 'NSS Community Outreach Drive',
                'body' => 'Volunteers invited for environmental and social awareness activities.',
            ],
        ];

        $activeCategory = (string) $request->query('category', 'all');
        $allowed = ['all', 'exam', 'admission', 'event', 'scholarship', 'general'];
        if (!in_array($activeCategory, $allowed, true)) {
            $activeCategory = 'all';
        }

        return view('notices.index', [
            'notices' => $allNotices,
            'activeCategory' => $activeCategory,
        ]);
    }

    public function view(string $slug)
    {
        $title = Str::of(str_replace('-', ' ', $slug))->headline();

        return view('notices.internal-notice', [
            'slug' => $slug,
            'title' => (string) $title,
        ]);
    }
}
