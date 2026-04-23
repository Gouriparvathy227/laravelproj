@extends('layouts.frontend')
@section('title', 'Faculty')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Faculty Directory</h1>
      <p class="mt-4 text-slate-700">Experienced faculty members with research and teaching expertise across disciplines.</p>
    </header>
    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Dr. Joseph Thomas</h2><p class="text-sm mt-2">Asst. Professor, Physics</p><p class="text-xs text-slate-600 mt-1">PhD | Condensed Matter | 12 years</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Dr. Mini Varghese</h2><p class="text-sm mt-2">Professor, Chemistry</p><p class="text-xs text-slate-600 mt-1">PhD | Organic Chemistry | 15 years</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Prof. Renu James</h2><p class="text-sm mt-2">Asst. Professor, Commerce</p><p class="text-xs text-slate-600 mt-1">M.Com, NET | Finance | 10 years</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Dr. Anjali Nair</h2><p class="text-sm mt-2">HOD, English</p><p class="text-xs text-slate-600 mt-1">PhD | Literary Studies | 14 years</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Dr. Sam George</h2><p class="text-sm mt-2">Asst. Professor, Food Technology</p><p class="text-xs text-slate-600 mt-1">PhD | Food Process Engg. | 9 years</p></article>
      <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-semibold text-sgcNavy">Prof. Nisha Mathew</h2><p class="text-sm mt-2">Asst. Professor, Computer Science</p><p class="text-xs text-slate-600 mt-1">M.Tech | Data Systems | 8 years</p></article>
    </section>
@endsection
