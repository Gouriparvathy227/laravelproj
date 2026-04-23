<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\FacultyProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class FacultyController extends Controller
{
    public function index(): View
    {
        try {
            $tableExists = Schema::hasTable('faculty_profiles');
            $faculties = $tableExists
                ? FacultyProfile::with('department')->latest()->get()
                : collect();
            $departments = Schema::hasTable('departments')
                ? Department::query()->orderBy('name')->get()
                : collect();

            $faculty = $faculties;

            return view('admin.faculty.index', compact('faculties', 'faculty', 'tableExists', 'departments'));
        } catch (\Throwable $exception) {
            report($exception);

            return view('admin.faculty.index', [
                'facultyMembers' => collect(),
                'faculties' => collect(),
                'faculty' => collect(),
                'tableExists' => Schema::hasTable('faculty_profiles'),
                'departments' => collect(),
            ])->with('error', 'Unable to load faculty records right now.');
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            abort_unless(Schema::hasTable('faculty_profiles'), 500, 'faculty_profiles table not found.');

            $validated = $this->validateRequest($request);
            $validated = $this->normalizeFacultyPayload($validated);

            $photoPath = $request->file('photo')
                ? $request->file('photo')->store('faculty', 'public')
                : null;

            unset($validated['photo']);
            $validated = $this->filterToExistingColumns($validated);

            FacultyProfile::create([
                ...$validated,
                'photo_path' => $photoPath,
                'is_active' => $request->boolean('is_active', true),
                'is_hod' => $request->boolean('is_hod', false),
            ]);

            return back()->with('success', 'Faculty profile saved.');
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->with('error', 'Failed to save faculty profile. Please verify required fields and table structure, then try again.');
        }
    }

    public function update(Request $request, FacultyProfile $faculty): RedirectResponse
    {
        try {
            $validated = $this->validateRequest($request, true);
            $validated = $this->normalizeFacultyPayload($validated);
            unset($validated['photo']);
            $validated = $this->filterToExistingColumns($validated);

            if ($request->hasFile('photo')) {
                $validated['photo_path'] = $request->file('photo')->store('faculty', 'public');
            }

            $validated['is_active'] = $request->boolean('is_active', true);
            $validated['is_hod'] = $request->boolean('is_hod', false);

            $faculty->update($validated);

            return back()->with('success', 'Faculty profile updated.');
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->with('error', 'Failed to update faculty profile. Please verify required fields and table structure, then try again.');
        }
    }

    public function destroy(FacultyProfile $faculty): RedirectResponse
    {
        $faculty->delete();

        return back()->with('success', 'Faculty profile removed.');
    }

    private function validateRequest(Request $request, bool $updating = false): array
    {
        $departmentRule = Schema::hasTable('departments')
            ? ['nullable', 'integer', 'exists:departments,id']
            : ['nullable', 'integer'];

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:120'],
            'department' => ['required', 'string', 'max:120'],
            'qualification' => ['nullable', 'string', 'max:150'],
            'specialization' => ['nullable', 'string', 'max:150'],
            'experience' => ['nullable', 'string', 'max:120'],
            'experience_years' => ['nullable', 'integer', 'min:0', 'max:60'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'bio' => ['nullable', 'string'],
            'department_id' => $departmentRule,
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_hod' => ['nullable', 'boolean'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function normalizeFacultyPayload(array $validated): array
    {
        // Keep DB writes consistent with schema defaults and prevent null/int mismatches.
        if (!array_key_exists('experience_years', $validated) || $validated['experience_years'] === null) {
            $validated['experience_years'] = 0;
        }

        return $validated;
    }

    private function filterToExistingColumns(array $payload): array
    {
        $columns = Schema::getColumnListing('faculty_profiles');

        return collect($payload)
            ->only($columns)
            ->all();
    }
}
