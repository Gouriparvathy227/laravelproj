<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admission Requests') }}
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
                    Admission applications table not found. Run migrations to enable this section.
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Submitted Applications</h3>
                <div class="mt-4 space-y-4">
                    @forelse ($applications as $application)
                        <article class="border rounded-lg p-4">
                            <div class="flex flex-wrap items-start justify-between gap-4">
                                <div class="space-y-1">
                                    <h4 class="font-semibold text-gray-900">{{ $application->full_name }}</h4>
                                    <p class="text-sm text-gray-600">ID: {{ $application->application_id }} | {{ $application->email }} | {{ $application->phone }}</p>
                                    <p class="text-xs text-gray-500">Programs: {{ $application->pref1 }}, {{ $application->pref2 }}, {{ $application->pref3 }}</p>
                                    <p class="text-xs text-gray-500">Submitted: {{ $application->created_at?->format('d M Y, h:i A') }}</p>
                                </div>

                                <form method="POST" action="{{ route('admin.admissions.update', $application) }}" class="space-y-2 min-w-[240px]">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="w-full rounded border-gray-300 text-sm">
                                        @foreach (['pending', 'shortlisted', 'admitted', 'rejected'] as $status)
                                            <option value="{{ $status }}" @selected($application->status === $status)>{{ ucfirst($status) }}</option>
                                        @endforeach
                                    </select>
                                    <textarea
                                        name="remarks"
                                        rows="2"
                                        class="w-full rounded border-gray-300 text-sm"
                                        placeholder="Remarks (optional)"
                                    >{{ old('remarks', $application->remarks) }}</textarea>
                                    <button class="w-full px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">Update Status</button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <p class="text-sm text-gray-600">No admission requests found.</p>
                    @endforelse
                </div>

                @if ($applications instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-6">
                        {{ $applications->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
