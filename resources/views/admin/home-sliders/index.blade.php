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
                @if(session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        {{ session('error') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <ul class="list-disc pl-5 space-y-1 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <h3 class="text-xl font-bold mb-4">Current Sliders</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    @forelse($sliders ?? [] as $slide)
                        <div class="border rounded p-2 shadow">
                            <img src="{{ $slide->image_url }}" class="h-32 w-full object-cover rounded mb-2" alt="{{ $slide->alt_text ?? 'Slider image' }}">
                            <form action="{{ route('admin.home-sliders.update', $slide->id) }}" method="POST" enctype="multipart/form-data" class="space-y-2">
                                @csrf
                                @method('PATCH')
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700">Title</label>
                                    <input type="text" name="title" value="{{ $slide->title }}" class="mt-1 w-full rounded border-gray-300 text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700">Description</label>
                                    <textarea name="caption" rows="2" class="mt-1 w-full rounded border-gray-300 text-sm">{{ $slide->caption }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700">Display Order</label>
                                    <input type="number" name="display_order" value="{{ $slide->display_order ?? 0 }}" class="mt-1 w-full rounded border-gray-300 text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-700">Replace Image (optional)</label>
                                    <input type="file" name="image" accept="image/*" class="mt-1 w-full text-sm">
                                </div>
                                <label class="inline-flex items-center gap-2 text-xs text-gray-700">
                                    <input type="checkbox" name="is_active" value="1" {{ $slide->is_active ? 'checked' : '' }}>
                                    Active
                                </label>
                                <button type="submit" class="w-full text-xs bg-blue-600 hover:bg-blue-700 text-white rounded px-2 py-1.5">
                                    Save Changes
                                </button>
                            </form>
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
                        <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="caption" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
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
