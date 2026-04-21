<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = $this->getDepartments();

        return view('departments.index', compact('departments'));
    }

    public function show(string $slug)
    {
        $department = $this->getDepartments()
            ->firstWhere('slug', $slug);

        abort_if(!$department, 404);

        return view('departments.show', compact('department'));
    }

    private function getDepartments(): Collection
    {
        try {
            if (Schema::hasTable('departments')) {
                $dbDepartments = Department::query()
                    ->orderBy('name')
                    ->get()
                    ->map(function (Department $department): array {
                        return [
                            'name' => $department->name,
                            'slug' => $department->slug,
                            'code' => $department->code,
                            'programs' => $this->programsFor($department->name),
                            'summary' => $department->about ?: 'Department information will be updated by admin.',
                            'research_center' => (bool) $department->research_center,
                            'established_year' => $department->established_year,
                        ];
                    });

                if ($dbDepartments->isNotEmpty()) {
                    return $dbDepartments->values();
                }
            }
        } catch (\Throwable) {
            return collect($this->fallbackDepartments());
        }

        return collect($this->fallbackDepartments());
    }

    private function programsFor(string $departmentName): string
    {
        $programMap = [
            'physics' => 'B.Sc., M.Sc.',
            'chemistry' => 'B.Sc., M.Sc.',
            'botany' => 'B.Sc.',
            'zoology' => 'B.Sc.',
            'mathematics' => 'B.Sc.',
            'computer science' => 'BCA',
            'food technology' => 'B.Voc, M.Sc.',
            'english' => 'B.A., M.A., Integrated M.A.',
            'economics' => 'B.A.',
            'commerce' => 'B.Com, M.Com',
            'malayalam' => 'B.A.',
            'history' => 'B.A.',
            'hindi' => 'B.A.',
            'political science' => 'B.A.',
            'sociology' => 'B.A.',
        ];

        return $programMap[Str::lower($departmentName)] ?? 'Program details available on request';
    }

    private function fallbackDepartments(): array
    {
        return [
            ['name' => 'Physics', 'slug' => 'physics', 'code' => 'PHY', 'programs' => 'B.Sc., M.Sc.', 'summary' => 'Recognized research center with DST-FIST supported facilities.', 'research_center' => true, 'established_year' => null],
            ['name' => 'Chemistry', 'slug' => 'chemistry', 'code' => 'CHE', 'programs' => 'B.Sc., M.Sc.', 'summary' => 'Research center focusing analytical and applied chemistry.', 'research_center' => true, 'established_year' => null],
            ['name' => 'Botany', 'slug' => 'botany', 'code' => 'BOT', 'programs' => 'B.Sc.', 'summary' => 'Plant sciences, biodiversity, and environmental studies.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Zoology', 'slug' => 'zoology', 'code' => 'ZOO', 'programs' => 'B.Sc.', 'summary' => 'Animal sciences with lab and field components.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Mathematics', 'slug' => 'mathematics', 'code' => 'MAT', 'programs' => 'B.Sc.', 'summary' => 'Pure and applied mathematics with analytical training.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Computer Science', 'slug' => 'computer-science', 'code' => 'CS', 'programs' => 'BCA', 'summary' => '5 computer labs supporting programming and software practice.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Food Technology', 'slug' => 'food-technology', 'code' => 'FST', 'programs' => 'B.Voc, M.Sc.', 'summary' => 'RUSA-funded science block and quality testing facilities.', 'research_center' => false, 'established_year' => null],
            ['name' => 'English', 'slug' => 'english', 'code' => 'ENG', 'programs' => 'B.A., M.A., Integrated M.A.', 'summary' => 'Literature, communication, and critical studies.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Economics', 'slug' => 'economics', 'code' => 'ECO', 'programs' => 'B.A.', 'summary' => 'Development economics, policy, and data interpretation.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Commerce', 'slug' => 'commerce', 'code' => 'COM', 'programs' => 'B.Com, M.Com', 'summary' => 'Accounting, taxation, finance, and banking readiness.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Malayalam', 'slug' => 'malayalam', 'code' => 'MAL', 'programs' => 'B.A.', 'summary' => 'Regional literature, culture, and language scholarship.', 'research_center' => false, 'established_year' => null],
            ['name' => 'History', 'slug' => 'history', 'code' => 'HIS', 'programs' => 'B.A.', 'summary' => 'Historical inquiry with local and global perspectives.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Hindi', 'slug' => 'hindi', 'code' => 'HIN', 'programs' => 'B.A.', 'summary' => 'Language, translation, and literary studies.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Political Science', 'slug' => 'political-science', 'code' => 'PSC', 'programs' => 'B.A.', 'summary' => 'Governance, political thought, and public policy.', 'research_center' => false, 'established_year' => null],
            ['name' => 'Sociology', 'slug' => 'sociology', 'code' => 'SOC', 'programs' => 'B.A.', 'summary' => 'Social structures, community studies, and applied sociology.', 'research_center' => false, 'established_year' => null],
        ];
    }
}
