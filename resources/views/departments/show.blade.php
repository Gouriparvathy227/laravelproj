@extends('layouts.frontend')
@section('title', $department['name'] . ' Department')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <p class="text-xs tracking-wide uppercase text-slate-500">Department</p>
      <h1 class="mt-2 font-heading text-4xl text-sgcNavy">{{ $department['name'] }}</h1>
      <p class="mt-4 text-slate-700 max-w-4xl">{{ $department['summary'] }}</p>
    </header>

    <section class="mt-8 grid lg:grid-cols-3 gap-6">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Overview</h2>
        <div class="mt-8 text-sm text-slate-700 space-y-3">
          <p><strong>Program Stream:</strong> {{ $department['programs'] }}</p>
          <p><strong>Department Code:</strong> {{ $department['code'] }}</p>
          @if (!empty($department['established_year']))
            <p><strong>Established Year:</strong> {{ $department['established_year'] }}</p>
          @endif
          <p><strong>Research Center:</strong> {{ $department['research_center'] ? 'Yes' : 'No' }}</p>
        </div>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-7">
        <h3 class="font-heading text-2xl">Quick Actions</h3>
        <div class="mt-5 grid gap-3 text-sm">
          <a href="{{ route('admissions.apply') }}" class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring">Apply for Admission</a>
          <a href="{{ route('faculty.index') }}" class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring">Faculty Directory</a>
          <a href="{{ route('contact.index') }}" class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring">Department Contact</a>
          <a href="{{ route('departments.index') }}" class="rounded-lg bg-sgcGold px-4 py-3 text-center font-medium hover:bg-amber-700 focus-ring">Back to All Departments</a>
        </div>
      </aside>
    </section>
@endsection
