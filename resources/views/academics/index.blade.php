@extends('layouts.frontend')
@section('title', 'Academics')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Academics</h1>
      <p class="mt-4 text-slate-700 max-w-4xl">The college offers 17 undergraduate programs, 5 postgraduate programs, and one Integrated M.A. program, with strong support for research and learner-centered pedagogy.</p>
    </header>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7 table-wrap">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">UG Programs (17)</h2>
      <table class="table-mobile-cards mt-8 min-w-full text-sm">
        <thead>
          <tr class="text-left border-b border-slate-200">
            <th class="py-3 pr-4">Program</th>
            <th class="py-3 pr-4">Duration</th>
            <th class="py-3 pr-4">Type</th>
            <th class="py-3 pr-4">Approx. Fee</th>
            <th class="py-3 pr-4">Highlights</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Physics</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Research Centre, DST-FIST</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Chemistry</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Research Centre, DST-FIST</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Botany</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Field studies</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Zoology</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Lab-intensive curriculum</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Mathematics</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Advanced analytics</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">BCA</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Self-Financed</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 1,13,000 total</td><td data-label="Highlights" class="py-3 pr-4">5 Computer Labs</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Sc. Food Science & Technology</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Self-Financed</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 21,840/year</td><td data-label="Highlights" class="py-3 pr-4">RUSA Science Block</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.Voc Food Technology</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Self-Financed</td><td data-label="Approx. Fee" class="py-3 pr-4">As per prospectus</td><td data-label="Highlights" class="py-3 pr-4">Skill-focused model</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">B.A. English / Economics / Malayalam / History / Hindi / Political Science / Sociology</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Broad humanities foundation</td></tr>
          <tr><td data-label="Program" class="py-3 pr-4">B.Com (+ Additional stream)</td><td data-label="Duration" class="py-3 pr-4">3 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Approx. Fee" class="py-3 pr-4">INR 6,970/year</td><td data-label="Highlights" class="py-3 pr-4">Commerce and banking focus</td></tr>
        </tbody>
      </table>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7 table-wrap">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">PG & Integrated Programs</h2>
      <table class="table-mobile-cards mt-8 min-w-full text-sm">
        <thead>
          <tr class="text-left border-b border-slate-200">
            <th class="py-3 pr-4">Program</th>
            <th class="py-3 pr-4">Duration</th>
            <th class="py-3 pr-4">Type</th>
            <th class="py-3 pr-4">Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">M.Sc. Chemistry</td><td data-label="Duration" class="py-3 pr-4">2 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Notes" class="py-3 pr-4">Research stream, DST-FIST support</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">M.Sc. Physics</td><td data-label="Duration" class="py-3 pr-4">2 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Notes" class="py-3 pr-4">Advanced lab research track</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">M.Sc. Food Science & Technology</td><td data-label="Duration" class="py-3 pr-4">2 Years</td><td data-label="Type" class="py-3 pr-4">Aided/SF mix</td><td data-label="Notes" class="py-3 pr-4">University rank holder (2023)</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">M.Com</td><td data-label="Duration" class="py-3 pr-4">2 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Notes" class="py-3 pr-4">Accounting and finance specialization</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Program" class="py-3 pr-4">M.A. English</td><td data-label="Duration" class="py-3 pr-4">2 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Notes" class="py-3 pr-4">Literature and criticism</td></tr>
          <tr><td data-label="Program" class="py-3 pr-4">Integrated M.A. English</td><td data-label="Duration" class="py-3 pr-4">5 Years</td><td data-label="Type" class="py-3 pr-4">Aided</td><td data-label="Notes" class="py-3 pr-4">UG+PG continuous pathway</td></tr>
        </tbody>
      </table>
    </section>

    <section class="mt-8 grid lg:grid-cols-3 gap-6">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Research & Academic Support</h2>
        <div class="mt-8 space-y-4 text-sm text-slate-700">
          <p><strong>Research Centres:</strong> Department of Chemistry and Department of Physics are recognized as research centers, supported under DST-FIST grant (2019).</p>
          <p><strong>Library (Athenaeum):</strong> Print and digital collections, journal subscriptions, e-resources, and reading support services.</p>
          <p><strong>Syllabus Repository:</strong> Department-wise semester syllabus documents downloadable through academic section.</p>
          <p><strong>Examination Support:</strong> Timetables, hall ticket notices, and result publication workflow available online.</p>
        </div>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-7">
        <h3 class="font-heading text-2xl">Academic Calendar</h3>
        <p class="mt-4 text-sm">2026 academic calendar includes admissions timeline, semester start dates, internal assessments, model exams, and university exam windows.</p>
        <a href="https://sgcaruvithura.ac.in/Assets/downloads/Files/001726700%201690449588-INTERNAL-exam-calendar-2021-22.pdf" target="_blank" rel="noopener noreferrer" class="mt-6 inline-block rounded-lg bg-sgcGold px-4 py-2 text-sm font-medium hover:bg-amber-700 focus-ring">Download Calendar PDF</a>
      </aside>
    </section>
@endsection
