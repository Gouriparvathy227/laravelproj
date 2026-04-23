<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notice Management') }}
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
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (!empty($tableExists) && !$tableExists)
                <div class="bg-amber-50 border border-amber-200 text-amber-800 px-4 py-3 rounded">
                    Notices table not found. Run migrations to enable this section.
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Create Notice</h3>
                <form method="POST" action="{{ route('admin.notices.store') }}" class="mt-4 grid md:grid-cols-2 gap-4">
                    @csrf
                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-gray-700">Title</label>
                        <input name="title" value="{{ old('title') }}" class="mt-1 w-full rounded border-gray-300" required />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Category</label>
                        <select name="category" class="mt-1 w-full rounded border-gray-300" required>
                            @foreach (['exam' => 'Exam', 'admission' => 'Admission', 'event' => 'Event', 'scholarship' => 'Scholarship', 'general' => 'General'] as $value => $label)
                                <option value="{{ $value }}" @selected(old('category', 'general') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Department (optional)</label>
                        <select name="department_id" class="mt-1 w-full rounded border-gray-300">
                            <option value="">All Departments</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @selected((string) old('department_id') === (string) $department->id)>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-gray-700">Body</label>
                        <textarea name="body" rows="4" class="mt-1 w-full rounded border-gray-300" required>{{ old('body') }}</textarea>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Attachment Path (optional)</label>
                        <input name="attachment_path" value="{{ old('attachment_path') }}" class="mt-1 w-full rounded border-gray-300" placeholder="notices/timetable.pdf or URL" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Publish At (optional)</label>
                        <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Expires At (optional)</label>
                        <input type="datetime-local" name="expires_at" value="{{ old('expires_at') }}" class="mt-1 w-full rounded border-gray-300" />
                    </div>
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', true)) />
                            Publish on website
                        </label>
                    </div>
                    <div class="md:col-span-2">
                        <button class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Save Notice</button>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Existing Notices</h3>
                <div class="mt-4 space-y-4">
                    @forelse ($notices as $notice)
                        <div class="border rounded-lg p-4">
                            <form method="POST" action="{{ route('admin.notices.update', $notice) }}" class="grid md:grid-cols-2 gap-3">
                                @csrf
                                @method('PATCH')
                                <div class="md:col-span-2">
                                    <label class="text-xs font-medium text-gray-600">Title</label>
                                    <input name="title" value="{{ $notice->title }}" class="mt-1 w-full rounded border-gray-300" required />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Category</label>
                                    <select name="category" class="mt-1 w-full rounded border-gray-300" required>
                                        @foreach (['exam' => 'Exam', 'admission' => 'Admission', 'event' => 'Event', 'scholarship' => 'Scholarship', 'general' => 'General'] as $value => $label)
                                            <option value="{{ $value }}" @selected($notice->category === $value)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Department</label>
                                    <select name="department_id" class="mt-1 w-full rounded border-gray-300">
                                        <option value="">All Departments</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" @selected((int) $notice->department_id === (int) $department->id)>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="text-xs font-medium text-gray-600">Body</label>
                                    <textarea name="body" rows="3" class="mt-1 w-full rounded border-gray-300" required>{{ $notice->body }}</textarea>
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Attachment Path</label>
                                    <input name="attachment_path" value="{{ $notice->attachment_path }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Publish At</label>
                                    <input type="datetime-local" name="published_at" value="{{ optional($notice->published_at)->format('Y-m-d\TH:i') }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div>
                                    <label class="text-xs font-medium text-gray-600">Expires At</label>
                                    <input type="datetime-local" name="expires_at" value="{{ optional($notice->expires_at)->format('Y-m-d\TH:i') }}" class="mt-1 w-full rounded border-gray-300" />
                                </div>
                                <div class="flex items-end">
                                    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                        <input type="checkbox" name="is_published" value="1" {{ $notice->is_published ? 'checked' : '' }} />
                                        Published
                                    </label>
                                </div>
                                <div class="md:col-span-2 flex flex-wrap items-center gap-3">
                                    <button class="px-3 py-2 bg-gray-900 text-white rounded hover:bg-black">Update</button>
                                    <span class="text-xs text-gray-500">
                                        Posted by: {{ $notice->poster?->name ?? 'Unknown' }} | Created: {{ optional($notice->created_at)->format('d M Y, h:i A') }}
                                    </span>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('admin.notices.destroy', $notice) }}" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">No notices found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
