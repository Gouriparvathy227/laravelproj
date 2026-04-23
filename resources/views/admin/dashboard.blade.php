<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-4">
                    {{ __("You're logged in as an Admin!") }}
                </div>
                
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ url('/admin/home-sliders') }}" class="block p-4 border rounded shadow hover:bg-gray-50">
                        <h3 class="font-bold text-lg text-blue-600">Home Sliders Management</h3>
                        <p class="text-sm text-gray-500">Manage images that appear on the homepage slider.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
