@extends('layouts.frontend')
@section('title', 'Events')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Campus Events</h1>
      <p class="mt-4 text-slate-700">Academic, cultural, sports, and social impact events throughout the year.</p>
    </header>
    <section class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><p class="text-xs text-slate-500">24 Apr 2026 | Women Cell</p><h2 class="font-semibold mt-2 text-sgcNavy">International Women's Day Program</h2><p class="mt-2 text-sm text-slate-600">Awareness sessions, student performances, and leadership talks.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><p class="text-xs text-slate-500">02 May 2026 | Placement Cell</p><h2 class="font-semibold mt-2 text-sgcNavy">Placement Bootcamp</h2><p class="mt-2 text-sm text-slate-600">Resume review and interview simulation for final year students.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><p class="text-xs text-slate-500">10 May 2026 | Academic</p><h2 class="font-semibold mt-2 text-sgcNavy">Research Expo</h2><p class="mt-2 text-sm text-slate-600">Interdepartmental poster and project presentation event.</p></article>
    </section>
@endsection
