<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home Sliders Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif
                
                <h3 class="text-xl font-bold mb-4">Current Sliders</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    @forelse($slides ?? [] as $slide)
                        <div class="border rounded p-2 shadow">
                            <img src="{{ Storage::url($slide->image_path) }}" class="h-32 w-full object-cover rounded mb-2">
                            <p class="font-bold text-sm">{{ $slide->title ?? 'No title' }}</p>
                            <p class="text-xs text-gray-500">Order: {{ $slide->display_order }} | Active: {{ $slide->is_active ? 'Yes' : 'No' }}</p>
                            <form action="{{ url('/admin/home-sliders/' . $slide->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-600 underline">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-500">No sliders found.</p>
                    @endforelse
                </div>

                <hr class="mb-6">

                <h3 class="text-xl font-bold mb-4">Add New Slider</h3>
                <form action="{{ url('/admin/home-sliders') }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input type="file" name="image" required class="w-full">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Display Order</label>
                        <input type="number" name="display_order" value="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Upload Slider
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
