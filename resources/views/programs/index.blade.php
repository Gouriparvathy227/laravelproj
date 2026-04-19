@extends('layouts.frontend')
@section('title', 'Programs')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Programs Catalogue</h1>
      <p class="mt-4 text-slate-700">Browse UG, PG, and Integrated programs with eligibility and seat details.</p>
    </header>
    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">B.Sc. Physics</h2><p class="mt-2 text-sm text-slate-600">Duration: 3 years | Seats: 40 | Type: UG (Aided)</p><p class="text-xs mt-2">Eligibility: 10+2 with Physics and Mathematics.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">BCA</h2><p class="mt-2 text-sm text-slate-600">Duration: 3 years | Seats: 60 | Type: UG (SF)</p><p class="text-xs mt-2">Eligibility: 10+2 any stream with mathematics/computer exposure preferred.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">M.Sc. Food Science</h2><p class="mt-2 text-sm text-slate-600">Duration: 2 years | Seats: 20 | Type: PG</p><p class="text-xs mt-2">Eligibility: Relevant science degree from recognized university.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">M.Com</h2><p class="mt-2 text-sm text-slate-600">Duration: 2 years | Seats: 20 | Type: PG (Aided)</p><p class="text-xs mt-2">Eligibility: B.Com/BBA or equivalent.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Integrated M.A. English</h2><p class="mt-2 text-sm text-slate-600">Duration: 5 years | Type: Integrated</p><p class="text-xs mt-2">Eligibility: 10+2 with language proficiency.</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">B.Com</h2><p class="mt-2 text-sm text-slate-600">Duration: 3 years | Seats: 60 | Type: UG (Aided)</p><p class="text-xs mt-2">Eligibility: 10+2 with commerce/accounting preference.</p></article>
    </section>
@endsection
