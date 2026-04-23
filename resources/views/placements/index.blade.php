@extends('layouts.frontend')
@section('title', 'Placements')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Placements & Achievements</h1>
      <p class="mt-4 text-slate-700">Strong industry connect with regular recruiters and notable student achievements in academics, scholarships, NSS, and research.</p>
    </header>

    <section class="mt-8 grid md:grid-cols-4 gap-4">
      <article class="stat-card rounded-xl bg-white border border-slate-200 p-5"><p class="text-sm text-slate-500">Average Package</p><p class="mt-2 text-3xl font-bold text-sgcNavy">?4–6 LPA</p></article>
      <article class="stat-card rounded-xl bg-white border border-slate-200 p-5"><p class="text-sm text-slate-500">Active Recruiters</p><p class="mt-2 text-3xl font-bold text-sgcNavy">8+</p></article>
      <article class="stat-card rounded-xl bg-white border border-slate-200 p-5"><p class="text-sm text-slate-500">CTS Drive</p><p class="mt-2 text-3xl font-bold text-sgcNavy">2025-26</p></article>
      <article class="stat-card rounded-xl bg-white border border-slate-200 p-5"><p class="text-sm text-slate-500">Top Scholarship</p><p class="mt-2 text-3xl font-bold text-sgcNavy">?1 Lakh</p></article>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">Recruiters</h2>
      <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-3 text-sm font-semibold text-center">
        <div class="rounded-lg border border-slate-200 p-3">TCS</div>
        <div class="rounded-lg border border-slate-200 p-3">Infosys</div>
        <div class="rounded-lg border border-slate-200 p-3">Wipro</div>
        <div class="rounded-lg border border-slate-200 p-3">Cognizant</div>
        <div class="rounded-lg border border-slate-200 p-3">HCL Technologies</div>
        <div class="rounded-lg border border-slate-200 p-3">Deloitte</div>
        <div class="rounded-lg border border-slate-200 p-3">Capgemini</div>
        <div class="rounded-lg border border-slate-200 p-3">South Indian Bank</div>
      </div>
    </section>

    <section class="mt-8 grid lg:grid-cols-2 gap-6">
      <article class="rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Year-wise Highlights</h2>
        <ul class="mt-8 list-disc pl-6 text-sm text-slate-700 space-y-2">
          <li>CTS placements confirmed during 2025-26 recruitment cycle.</li>
          <li>M.Sc. Food Technology secured university rank in 2023.</li>
          <li>Chief Minister's Scholarship (?1 lakh) awarded to eligible students in 2023-24.</li>
          <li>NSS received state-level and university-level recognition for service initiatives.</li>
        </ul>
      </article>

      <article class="rounded-2xl bg-white border border-slate-200 p-7 table-wrap">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Sample Placement Records</h2>
        <table class="table-mobile-cards mt-8 min-w-full text-sm">
          <thead>
            <tr class="text-left border-b border-slate-200">
              <th class="py-3 pr-4">Company</th>
              <th class="py-3 pr-4">Role</th>
              <th class="py-3 pr-4">Package</th>
              <th class="py-3 pr-4">Year</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b border-slate-100"><td data-label="Company" class="py-3 pr-4">TCS</td><td data-label="Role" class="py-3 pr-4">Associate System Engineer</td><td data-label="Package" class="py-3 pr-4">?4.2 LPA</td><td data-label="Year" class="py-3 pr-4">2025</td></tr>
            <tr class="border-b border-slate-100"><td data-label="Company" class="py-3 pr-4">Wipro</td><td data-label="Role" class="py-3 pr-4">Project Engineer</td><td data-label="Package" class="py-3 pr-4">?4.8 LPA</td><td data-label="Year" class="py-3 pr-4">2025</td></tr>
            <tr class="border-b border-slate-100"><td data-label="Company" class="py-3 pr-4">Cognizant</td><td data-label="Role" class="py-3 pr-4">Programmer Analyst Trainee</td><td data-label="Package" class="py-3 pr-4">?5.6 LPA</td><td data-label="Year" class="py-3 pr-4">2026</td></tr>
            <tr><td data-label="Company" class="py-3 pr-4">South Indian Bank</td><td data-label="Role" class="py-3 pr-4">Probationary Officer</td><td data-label="Package" class="py-3 pr-4">?6.0 LPA</td><td data-label="Year" class="py-3 pr-4">2026</td></tr>
          </tbody>
        </table>
      </article>
    </section>
@endsection
