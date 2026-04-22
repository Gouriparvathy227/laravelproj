<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeSliderController extends Controller
{
    public function index(): View
    {
        try {
            $orderColumn = Schema::hasColumn('home_sliders', 'order') ? 'order' : 'display_order';
            $sliders = Schema::hasTable('home_sliders')
                ? HomeSlider::query()->orderBy($orderColumn)->orderByDesc('created_at')->get()
                : collect();

            return view('admin.home-sliders.index', compact('sliders'));
        } catch (\Throwable $exception) {
            report($exception);

            return view('admin.home-sliders.index', ['sliders' => collect()])
                ->with('error', 'Unable to load sliders right now.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => ['nullable', 'string', 'max:255'],
                'subtitle' => ['nullable', 'string', 'max:255'],
                'caption' => ['nullable', 'string', 'max:2000'],
                'alt_text' => ['nullable', 'string', 'max:255'],
                'order' => ['nullable', 'integer', 'min:0'],
                'display_order' => ['nullable', 'integer', 'min:0'],
                'is_active' => ['nullable', 'boolean'],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            ]);

            $path = Storage::disk('public')->put('sliders', $request->file('image'));

            $payload = [
                'title' => $validated['title'] ?? null,
                'caption' => $validated['caption'] ?? null,
                'alt_text' => $validated['alt_text'] ?? null,
                'display_order' => $validated['display_order'] ?? 0,
                'is_active' => (bool) ($validated['is_active'] ?? true),
                'image_path' => $path,
                'uploaded_by' => $request->user()?->id,
            ];

            if (Schema::hasColumn('home_sliders', 'subtitle')) {
                $payload['subtitle'] = $validated['subtitle'] ?? null;
            }

            if (Schema::hasColumn('home_sliders', 'order')) {
                $payload['order'] = $validated['order'] ?? ($validated['display_order'] ?? 0);
            }

            HomeSlider::create($payload);

            return back()->with('success', 'Homepage image added successfully.');
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->with('error', 'Failed to upload slider image. Please try again.');
        }
    }

    public function destroy(int $id)
    {
        $slide = HomeSlider::findOrFail($id);

        if ($slide->image_path && Storage::disk('public')->exists($slide->image_path)) {
            Storage::disk('public')->delete($slide->image_path);
        }

        $slide->delete();

        return back()->with('success', 'Homepage image removed successfully.');
    }
}
