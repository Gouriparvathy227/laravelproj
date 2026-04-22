@extends('layouts.frontend')
@section('title', 'Departments')
@section('content')
<header class="rounded-3xl bg-primary text-white p-8 md:p-12">
      <h1 class="font-heading text-4xl md:text-5xl">Our Departments</h1>
      <p class="mt-4 text-white/90 max-w-3xl">St. George's College offers a wide range of undergraduate and postgraduate programmes designed to combine academic depth with practical career readiness.</p>
      <div class="mt-6 flex flex-wrap gap-2">
        <span class="accent-badge">Research Focused</span>
        <span class="accent-badge">NAAC A++</span>
        <span class="accent-badge">Industry Aligned</span>
      </div>
    </header>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Department Overview</h2>
      <p class="mt-8 text-slate-700">From sciences and humanities to commerce and technology, our departments support students with experienced faculty, modern laboratories, and academic mentoring.</p>
      <p class="mt-3 text-slate-700">Each department page provides detailed information on faculty leadership, programme strengths, and learning opportunities for students.</p>
    </section>

    <section class="mt-8 grid sm:grid-cols-3 gap-4">
      <article class="rounded-xl bg-white border border-slate-200 p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide">Academic Units</p>
        <p class="mt-2 text-3xl font-bold text-sgcNavy">{{ $departments->count() }}</p>
      </article>
      <article class="rounded-xl bg-white border border-slate-200 p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide">Programmes</p>
        <p class="mt-2 text-3xl font-bold text-sgcNavy">UG + PG</p>
      </article>
      <article class="rounded-xl bg-white border border-slate-200 p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide">Learning Model</p>
        <p class="mt-2 text-3xl font-bold text-sgcNavy">Theory + Practice</p>
      </article>
    </section>

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
