<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculty Management') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if (!empty($tableExists) && !$tableExists)
                <div class="bg-amber-50 border border-amber-200 text-amber-800 px-4 py-3 rounded">
                    Faculty profiles table not found. Run migrations to enable this section.
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Add Faculty Profile</h3>
                <form method="POST" action="{{ route('admin.faculty.store') }}" enctype="multipart/form-data" class="mt-4 grid md:grid-cols-2 gap-4">
                    @csrf
                    <div>
                        <label class="text-sm font-medium text-gray-700">Name</label>
                        <input name="name" class="mt-1 w-full rounded border-gray-300" required />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Designation</label>
                        <input name="designation" class="mt-1 w-full rounded border-gray-300" required />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Department</label>
                        <input name="department" class="mt-1 w-full rounded border-gray-300" required />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Department Record</label>
                        <select name="department_id" class="mt-1 w-full rounded border-gray-300">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Qualification</label>
                        <input name="qualification" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Specialization</label>
                        <input name="specialization" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Experience</label>
                        <input name="experience" class="mt-1 w-full rounded border-gray-300" placeholder="8 years in higher education" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Experience (Years)</label>
                        <input name="experience_years" type="number" min="0" class="mt-1 w-full rounded border-gray-300" value="0" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Email</label>
                        <input name="email" type="email" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Phone</label>
                        <input name="phone" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" rows="3" class="mt-1 w-full rounded border-gray-300"></textarea>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Display Order</label>
                        <input name="display_order" type="number" min="0" class="mt-1 w-full rounded border-gray-300" value="0" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Photo</label>
                        <input name="photo" type="file" accept="image/*" class="mt-1 w-full text-sm" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                            <input type="checkbox" name="is_active" value="1" checked />
                            Active on public website
                        </label>
                    </div>
                    <div class="md:col-span-2">
                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                            <input type="checkbox" name="is_hod" value="1" />
                            Mark as HOD
                        </label>
                    </div>
                    <div class="md:col-span-2">
                        <button class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Save Faculty Profile</button>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Existing Faculty Profiles</h3>
                <div class="mt-4 space-y-4">
                    @forelse ($faculties as $member)
                        <div class="border rounded-lg p-4">
                            <form method="POST" action="{{ route('admin.faculty.update', $member) }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-3">
                                @csrf
                                @method('PATCH')
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Name</label>
                                    <input name="name" value="{{ $member->name }}" class="mt-1 w-full rounded border-gray-300" required />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Designation</label>
                                    <input name="designation" value="{{ $member->designation }}" class="mt-1 w-full rounded border-gray-300" required />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Department</label>
                                    <input name="department" value="{{ $member->department }}" class="mt-1 w-full rounded border-gray-300" required />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Department Record</label>
                                    <select name="department_id" class="mt-1 w-full rounded border-gray-300">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" @selected((int) $member->department_id === (int) $department->id)>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Qualification</label>
                                    <input name="qualification" value="{{ $member->qualification }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Specialization</label>
                                    <input name="specialization" value="{{ $member->specialization }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Experience</label>
                                    <input name="experience" value="{{ $member->experience }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Experience (Years)</label>
                                    <input name="experience_years" type="number" min="0" value="{{ $member->experience_years }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Email</label>
                                    <input name="email" type="email" value="{{ $member->email }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Phone</label>
                                    <input name="phone" value="{{ $member->phone }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div class="md:col-span-2">
                                    <label class="text-xs font-medium text-gray-600">Bio</label>
                                    <textarea name="bio" rows="3" class="mt-1 w-full rounded border-gray-300">{{ $member->bio }}</textarea>
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Display Order</label>
                                    <input name="display_order" type="number" min="0" value="{{ $member->display_order }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Replace Photo</label>
                                    <input name="photo" type="file" accept="image/*" class="mt-1 w-full text-sm" />
                                </div>
                                <div class="md:col-span-2">
                                    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                        <input type="checkbox" name="is_active" value="1" {{ $member->is_active ? 'checked' : '' }} />
                                        Active on public website
                                    </label>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                        <input type="checkbox" name="is_hod" value="1" {{ $member->is_hod ? 'checked' : '' }} />
                                        Mark as HOD
                                    </label>
                                </div>
                                <div class="md:col-span-2">
                                    <button class="px-3 py-2 bg-gray-900 text-white rounded hover:bg-black">Update</button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('admin.faculty.destroy', $member) }}" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">No faculty profiles found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
