<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-900 font-medium">{{ __("You're logged in as an Admin.") }}</p>
                <p class="text-sm text-gray-600 mt-1">Manage homepage content, departments, faculty, and inquiries from this panel.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                <a href="{{ route('admin.home-sliders.index') }}" class="block p-5 border rounded-lg bg-white hover:bg-gray-50 transition">
                    <h3 class="font-bold text-lg text-blue-700">Homepage Slider</h3>
                    <p class="text-sm text-gray-600 mt-1">Upload and order carousel images for home banner.</p>
                </a>

                <a href="{{ route('admin.departments.index') }}" class="block p-5 border rounded-lg bg-white hover:bg-gray-50 transition">
                    <h3 class="font-bold text-lg text-blue-700">Departments</h3>
                    <p class="text-sm text-gray-600 mt-1">Manage department cards and detail-page content.</p>
                </a>

                <a href="{{ route('admin.faculty.index') }}" class="block p-5 border rounded-lg bg-white hover:bg-gray-50 transition">
                    <h3 class="font-bold text-lg text-blue-700">Faculty Details</h3>
                    <p class="text-sm text-gray-600 mt-1">Add or update faculty profiles shown on public pages.</p>
                </a>

                <a href="{{ route('admin.inquiries.index') }}" class="block p-5 border rounded-lg bg-white hover:bg-gray-50 transition">
                    <h3 class="font-bold text-lg text-blue-700">Inquiry Inbox</h3>
                    <p class="text-sm text-gray-600 mt-1">Review contact-form submissions stored in database.</p>
                </a>

                <a href="{{ route('admin.admissions.index') }}" class="block p-5 border rounded-lg bg-white hover:bg-gray-50 transition">
                    <h3 class="font-bold text-lg text-blue-700">Admission Requests</h3>
                    <p class="text-sm text-gray-600 mt-1">Review online admission applications submitted by students.</p>
                </a>

                <a href="{{ route('admin.notices.index') }}" class="block p-5 border rounded-lg bg-white hover:bg-gray-50 transition">
                    <h3 class="font-bold text-lg text-blue-700">Notices & Events</h3>
                    <p class="text-sm text-gray-600 mt-1">Create, publish, and update notices shown on the public notices page.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
