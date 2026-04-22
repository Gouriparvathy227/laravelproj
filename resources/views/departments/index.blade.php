@extends('layouts.frontend')
@section('title', 'Departments')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Departments</h1>
      <p class="mt-4 text-slate-700">Explore every department, then open the detail page for HOD and faculty information.</p>
    </header>

    <section class="mt-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($departments as $dept)
          <div class="bg-white rounded-xl shadow p-5 flex flex-col justify-between">
            <div>
              <h3 class="font-bold text-lg">{{ $dept->name }}</h3>
              <p class="text-sm text-gray-500">{{ $dept->code }}</p>
              <p class="text-sm mt-2 line-clamp-2" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $dept->about ?: 'Department information will be updated soon.' }}</p>
            </div>
            <a href="{{ route('departments.show', $dept->id) }}"
               class="mt-4 text-blue-600 text-sm font-medium hover:underline">
              View Details ->
            </a>
          </div>
        @endforeach
      </div>
    </section>
@endsection
