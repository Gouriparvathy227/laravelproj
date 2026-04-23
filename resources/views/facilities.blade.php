@extends('layouts.frontend')
@section('title', 'Facilities')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Campus Facilities</h1>
      <p class="mt-4 text-slate-700">Comprehensive infrastructure supports academics, sports, student wellness, and inclusive campus access.</p>
    </header>

    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Computer Labs</h2><p class="mt-2 text-sm text-slate-600">Five modern labs with internet-enabled systems and subject software.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Athenaeum Library</h2><p class="mt-2 text-sm text-slate-600">Catalog access, e-resources, journal subscriptions, and reading spaces.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Auditorium</h2><p class="mt-2 text-sm text-slate-600">2,500-seat multipurpose hall for major events and conventions.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Indoor Stadium</h2><p class="mt-2 text-sm text-slate-600">Volleyball and basketball training facilities.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Outdoor Sports</h2><p class="mt-2 text-sm text-slate-600">Football field, cricket ground, and athletic activity zones.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Open Gym & Yoga Center</h2><p class="mt-2 text-sm text-slate-600">Student fitness, yoga practice, and wellness sessions.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Hostels</h2><p class="mt-2 text-sm text-slate-600">Dedicated accommodation options for men and women students.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Seminar Halls & Labs</h2><p class="mt-2 text-sm text-slate-600">Department labs and seminar venues for instruction and presentations.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Accessibility</h2><p class="mt-2 text-sm text-slate-600">Elevator access and inclusive campus movement support.</p></article>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">Infrastructure Highlights</h2>
      <ul class="mt-8 list-disc pl-6 text-sm text-slate-700 space-y-2">
        <li>RUSA-funded Science Block for advanced lab and classroom expansion.</li>
        <li>Golden Jubilee Block (2015) supporting academic and administrative operations.</li>
        <li>Campus environment near Meenachil River with strong green cover.</li>
        <li>Dedicated spaces for NSS activities, arts events, and student clubs.</li>
      </ul>
    </section>
@endsection
