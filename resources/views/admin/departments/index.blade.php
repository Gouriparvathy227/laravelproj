<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department Management') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (!empty($tableExists) && !$tableExists)
                <div class="bg-amber-50 border border-amber-200 text-amber-800 px-4 py-3 rounded">
                    Departments table not found. Run migrations to enable this section.
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Add Department</h3>
                <form method="POST" action="{{ route('admin.departments.store') }}" class="mt-4 grid md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="text-sm font-medium text-gray-700">Name</label>
                        <input name="name" class="mt-1 w-full rounded border-gray-300" required />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Code</label>
                        <input name="code" class="mt-1 w-full rounded border-gray-300" required />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Established Year</label>
                        <input name="established_year" type="number" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                            <input type="checkbox" name="research_center" value="1" />
                            Research Center
                        </label>
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-gray-700">About</label>
                        <textarea name="about" rows="3" class="mt-1 w-full rounded border-gray-300"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <button class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Save Department</button>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Existing Departments</h3>
                <div class="mt-4 space-y-4">
                    @forelse ($departments as $department)
                        <div class="border rounded-lg p-4">
                            <form method="POST" action="{{ route('admin.departments.update', $department) }}" class="grid md:grid-cols-2 gap-3">
                                @csrf
                                @method('PATCH')
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Name</label>
                                    <input name="name" value="{{ $department->name }}" class="mt-1 w-full rounded border-gray-300" required />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Code</label>
                                    <input name="code" value="{{ $department->code }}" class="mt-1 w-full rounded border-gray-300" required />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Established Year</label>
                                    <input name="established_year" type="number" value="{{ $department->established_year }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div class="flex items-end">
                                    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                        <input type="checkbox" name="research_center" value="1" {{ $department->research_center ? 'checked' : '' }} />
                                        Research Center
                                    </label>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="text-xs font-medium text-gray-600">About</label>
                                    <textarea name="about" rows="2" class="mt-1 w-full rounded border-gray-300">{{ $department->about }}</textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <button class="px-3 py-2 bg-gray-900 text-white rounded hover:bg-black">Update</button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">No departments found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
