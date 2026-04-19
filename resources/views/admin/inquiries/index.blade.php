<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inquiry Inbox') }}
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
                    Contact inquiries table not found. Run migrations to enable this section.
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-900">Submitted Inquiries</h3>
                <div class="mt-4 space-y-4">
                    @forelse ($inquiries as $inquiry)
                        <article class="border rounded-lg p-4">
                            <div class="flex flex-wrap items-start justify-between gap-2">
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $inquiry->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $inquiry->email }} @if($inquiry->phone) | {{ $inquiry->phone }} @endif</p>
                                    <p class="text-xs text-gray-500 mt-1">Topic: {{ $inquiry->topic ?: 'General' }} | {{ $inquiry->created_at?->format('d M Y, h:i A') }}</p>
                                </div>
                                <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Delete</button>
                                </form>
                            </div>
                            <p class="mt-3 text-sm text-gray-700 whitespace-pre-line">{{ $inquiry->message }}</p>
                        </article>
                    @empty
                        <p class="text-sm text-gray-600">No inquiries found.</p>
                    @endforelse
                </div>

                @if ($inquiries instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-6">
                        {{ $inquiries->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
