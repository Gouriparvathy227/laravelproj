@extends('layouts.frontend')
@section('title', $dept->name . ' Department')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <p class="text-xs tracking-wide uppercase text-slate-500">Department {{ $dept->code }}</p>
      <h1 class="mt-2 font-heading text-4xl text-sgcNavy">{{ $dept->name }}</h1>
      <p class="mt-4 text-slate-700 max-w-4xl">{{ $dept->about ?: 'Department details will be updated soon.' }}</p>
    </header>

    <section class="mt-8 grid lg:grid-cols-3 gap-6">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">About Department</h2>
        <div class="mt-8 text-sm text-slate-700 space-y-2">
          <p><strong>Name:</strong> {{ $dept->name }}</p>
          <p><strong>Code:</strong> {{ $dept->code }}</p>
          @if ($dept->established_year)
            <p><strong>Established:</strong> {{ $dept->established_year }}</p>
          @endif
          <p>{{ $dept->about ?: 'No detailed description available yet.' }}</p>
        </div>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-7">
        <h3 class="font-heading text-2xl">Head of Department</h3>
        @if ($hod)
          <div class="mt-5 space-y-2 text-sm">
            @if ($hod->photo_path)
              <img src="{{ asset('storage/' . $hod->photo_path) }}" alt="{{ $hod->name }}" class="h-16 w-16 rounded-full object-cover border border-white/30" />
            @endif
            <p><strong>Name:</strong> {{ $hod->name }}</p>
            <p><strong>Designation:</strong> {{ $hod->designation }}</p>
            <p><strong>Email:</strong> {{ $hod->email ?: 'Not available' }}</p>
          </div>
        @else
          <p class="mt-4 text-sm text-white/90">HOD details are not available.</p>
        @endif
      </aside>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Faculty List</h2>
      <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($dept->facultyProfiles as $faculty)
          <article class="rounded-xl border border-slate-200 p-4">
            <div class="flex items-center gap-3">
              @if ($faculty->photo_path)
                <img src="{{ asset('storage/' . $faculty->photo_path) }}" alt="{{ $faculty->name }}" class="h-12 w-12 rounded-full object-cover" />
              @else
                <div class="h-12 w-12 rounded-full bg-slate-200"></div>
              @endif
              <div>
                <p class="font-semibold text-slate-900">{{ $faculty->name }}</p>
                <p class="text-xs text-slate-500">{{ $faculty->designation }}</p>
              </div>
            </div>
            <p class="mt-3 text-xs text-slate-600">Qualification: {{ $faculty->qualification ?: 'Not available' }}</p>
          </article>
        @empty
          <p class="text-sm text-slate-600">No faculty profiles available for this department.</p>
        @endforelse
      </div>
    </section>
@endsection
