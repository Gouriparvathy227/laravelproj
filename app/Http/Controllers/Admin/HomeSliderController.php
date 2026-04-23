<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    public function index()
    {
        $slides = HomeSlider::orderBy('display_order')->orderByDesc('created_at')->get();

        return view('admin.home-sliders.index', compact('slides'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:2000'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $path = $request->file('image')->store('home-sliders', 'public');

        HomeSlider::create([
            'title' => $validated['title'] ?? null,
            'caption' => $validated['caption'] ?? null,
            'alt_text' => $validated['alt_text'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => (bool) ($validated['is_active'] ?? true),
            'image_path' => $path,
            'uploaded_by' => $request->user()?->id,
        ]);

        return back()->with('success', 'Homepage image added successfully.');
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
