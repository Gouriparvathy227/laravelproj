@extends('layouts.frontend')
@section('title', 'Departments')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Departments</h1>
      <p class="mt-4 text-slate-700">15 academic departments drive multidisciplinary learning, research, and student engagement across science, arts, commerce, and technology.</p>
    </header>

    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach ($departments as $department)
        <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5">
          <h2 class="font-heading text-2xl text-sgcNavy">{{ $department['name'] }}</h2>
          <p class="mt-2 text-sm text-slate-700">Programs: {{ $department['programs'] }}</p>
          <p class="mt-2 text-sm text-slate-600">{{ $department['summary'] }}</p>
          <a href="{{ route('departments.show', $department['slug']) }}" class="mt-4 inline-block text-sm font-semibold text-sgcNavy hover:text-sgcGold focus-ring">
            View Department Details
          </a>
        </article>
      @endforeach
    </section>

    <section class="mt-10 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Department Contacts & Resources</h2>
      <p class="mt-8 text-sm text-slate-700">Each department page now opens department-specific details so users can directly navigate to the exact program unit.</p>
      <div class="mt-5 flex flex-wrap gap-3 text-sm">
        <a href="{{ route('contact.index') }}" class="rounded-lg bg-sgcNavy text-white px-4 py-2 hover:bg-slate-800 focus-ring">Department Directory</a>
        <a href="{{ route('academics.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-50 focus-ring">Program Details</a>
      </div>
    </section>
@endsection
