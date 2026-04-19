<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacultyProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class FacultyController extends Controller
{
    public function index(): View
    {
        $tableExists = Schema::hasTable('faculty_profiles');

        $facultyMembers = $tableExists
            ? FacultyProfile::query()->orderBy('display_order')->orderBy('name')->get()
            : collect();

        return view('admin.faculty.index', compact('facultyMembers', 'tableExists'));
    }

    public function store(Request $request): RedirectResponse
    {
        abort_unless(Schema::hasTable('faculty_profiles'), 500, 'faculty_profiles table not found.');

        $validated = $this->validateRequest($request);

        $photoPath = $request->file('photo')
            ? $request->file('photo')->store('faculty/photos', 'public')
            : null;

        FacultyProfile::create([
            ...$validated,
            'photo_path' => $photoPath,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return back()->with('success', 'Faculty profile saved.');
    }

    public function update(Request $request, FacultyProfile $faculty): RedirectResponse
    {
        $validated = $this->validateRequest($request, true);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('faculty/photos', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        $faculty->update($validated);

        return back()->with('success', 'Faculty profile updated.');
    }

    public function destroy(FacultyProfile $faculty): RedirectResponse
    {
        $faculty->delete();

        return back()->with('success', 'Faculty profile removed.');
    }

    private function validateRequest(Request $request, bool $updating = false): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:120'],
            'department' => ['required', 'string', 'max:120'],
            'qualification' => ['nullable', 'string', 'max:150'],
            'specialization' => ['nullable', 'string', 'max:150'],
            'experience_years' => ['required', 'integer', 'min:0', 'max:60'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'photo' => [$updating ? 'nullable' : 'nullable', 'image', 'max:2048'],
        ]);
    }
}
