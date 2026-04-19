@extends('layouts.frontend')
@section('title', 'Admissions')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Admissions 2026</h1>
      <p class="mt-4 text-slate-700">Applications are processed online and integrated with Mahatma Gandhi University CAP allotment workflow.</p>
      <div class="mt-6 flex flex-wrap gap-3">
        <a href="{{ route('admissions.apply') }}" class="rounded-lg bg-sgcGold text-white px-5 py-3 font-medium hover:bg-amber-700 focus-ring">Apply Online</a>
        <a href="{{ route('admissions.status') }}" class="rounded-lg border border-slate-300 px-5 py-3 font-medium hover:bg-slate-50 focus-ring">Track Application</a>
      </div>
    </header>

    <section class="mt-8 grid lg:grid-cols-3 gap-6">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-3xl text-sgcNavy">Admission Workflow</h2>
        <ol class="mt-8 space-y-4 text-sm text-slate-700 list-decimal pl-6">
          <li>Applicant submits online form with program preferences and required documents.</li>
          <li>System sends confirmation email and unique application ID.</li>
          <li>Admin reviews and updates status: pending, shortlisted, admitted, or rejected.</li>
          <li>Applicant tracks status using application ID in status tracker module.</li>
          <li>Admitted candidates receive fee payment and student portal credential details by email.</li>
          <li>Final admission lists are published through downloadable reports.</li>
        </ol>
      </article>
      <aside class="rounded-2xl bg-sgcNavy text-white p-7">
        <h2 class="font-heading text-2xl">Required Documents</h2>
        <ul class="mt-5 text-sm space-y-2 list-disc pl-5">
          <li>10+2 Marksheet (PDF)</li>
          <li>Transfer Certificate</li>
          <li>Community Certificate (if applicable)</li>
          <li>Passport-size photo</li>
          <li>Identity proof</li>
        </ul>
      </aside>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7 table-wrap">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">Indicative Fee Structure</h2>
      <table class="table-mobile-cards mt-8 min-w-full text-sm">
        <thead>
          <tr class="text-left border-b border-slate-200">
            <th class="py-3 pr-4">Program</th>
            <th class="py-3 pr-4">Annual Fee (Approx.)</th>
            <th class="py-3 pr-4">Seat Type</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Physics / Chemistry / Botany</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">~?6,970/year</td><td data-label="Seat Type" class="py-3 pr-4">Aided</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.A. Streams</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">~?6,970/year</td><td data-label="Seat Type" class="py-3 pr-4">Aided</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Com</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">~?6,970/year</td><td data-label="Seat Type" class="py-3 pr-4">Aided</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">BCA</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">~?1,13,000 total</td><td data-label="Seat Type" class="py-3 pr-4">Self-Financed</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Food Science & Technology</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">?21,840/year</td><td data-label="Seat Type" class="py-3 pr-4">Self-Financed</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">M.Sc. Chemistry / Physics / Food Science</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">As per aided/SF seat</td><td data-label="Seat Type" class="py-3 pr-4">Mixed</td></tr>
          <tr><td data-label="Program" class="py-3 pr-4">M.Com / M.A. / Integrated M.A.</td><td data-label="Annual Fee (Approx.)" class="py-3 pr-4">~?6,970/year</td><td data-label="Seat Type" class="py-3 pr-4">Aided</td></tr>
        </tbody>
      </table>
    </section>

    <section class="mt-8 grid md:grid-cols-2 gap-6">
      <article class="rounded-2xl bg-white border border-slate-200 p-6">
        <h2 class="font-heading text-2xl text-sgcNavy">Reservation & Eligibility</h2>
        <p class="mt-4 text-sm text-slate-700">Admissions follow government and university norms for SC/ST/OBC/Minority categories with merit and CAP allotment considerations.</p>
      </article>
      <article class="rounded-2xl bg-white border border-slate-200 p-6">
        <h2 class="font-heading text-2xl text-sgcNavy">Admission Helpdesk</h2>
        <p class="mt-4 text-sm text-slate-700">For support, contact admissions office: +91 4822 273 235 | <a class="underline hover:text-sgcNavy" href="mailto:admissions@sgcaruvithura.ac.in">admissions@sgcaruvithura.ac.in</a></p>
      </article>
    </section>
@endsection
