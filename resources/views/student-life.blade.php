@extends('layouts.frontend')
@section('title', 'Student-life')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Student Life</h1>
      <p class="mt-4 text-slate-700">Student life blends academics with leadership, culture, social impact, and wellness.</p>
    </header>

    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">NSS Unit</h2><p class="mt-2 text-sm text-slate-600">State and university award-winning outreach and community programs.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Student Clubs</h2><p class="mt-2 text-sm text-slate-600">Chess, arts, cultural forum, and women's cell foster participation.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Peer Teaching</h2><p class="mt-2 text-sm text-slate-600">Peer-led learning modules and collaborative study support.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Annual Events</h2><p class="mt-2 text-sm text-slate-600">International Women's Day, Arts Gala, departmental fests.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Alumni Association</h2><p class="mt-2 text-sm text-slate-600">Mentoring, placement support, and institutional development.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Online Learning</h2><p class="mt-2 text-sm text-slate-600">Webinars and digital sessions sustained beyond the COVID period.</p></article>
    </section>
@endsection
