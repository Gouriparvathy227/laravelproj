@extends('layouts.frontend')
@section('title', 'About')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8 md:p-10 shadow-sm">
      <p class="text-sm uppercase tracking-wide text-sgcNavy font-semibold">About The Institution</p>
      <h1 class="font-heading text-4xl mt-3 text-sgcNavy">Legacy, Leadership & Academic Excellence</h1>
      <p class="mt-4 text-slate-700 max-w-4xl">St. George's College Aruvithura was founded in 1965 under St. George Forane Church and the visionary guidance of Rt. Rev. Dr. Sebastian Vayalil. The institution became a degree college in 1978 and today stands as a NAAC A++ accredited, UGC 2(f) and 12(B) recognized center of higher learning.</p>
    </header>

    <section class="grid lg:grid-cols-3 gap-6 mt-8">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-3xl text-sgcNavy">Vision & Mission</h2>
        <div class="mt-8 space-y-6 text-slate-700 leading-relaxed">
          <div>
            <h3 class="font-semibold text-lg text-slate-900">Vision</h3>
            <p class="mt-2">To nurture responsible citizens through quality higher education rooted in values, social commitment, and academic rigor, empowering learners to contribute meaningfully to the nation and the world.</p>
          </div>
          <div>
            <h3 class="font-semibold text-lg text-slate-900">Mission</h3>
            <ul class="mt-2 list-disc pl-6 space-y-2">
              <li>Deliver inclusive and transformative UG and PG education across arts, science, and commerce.</li>
              <li>Strengthen research culture through DST-FIST enabled laboratories and faculty scholarship.</li>
              <li>Promote student development via NSS, peer-teaching, clubs, and community engagement.</li>
              <li>Build strong industry linkage through placements, internships, and skill development.</li>
            </ul>
          </div>
        </div>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-7">
        <h2 class="font-heading text-2xl">Principal's Message</h2>
        <p class="mt-4 text-sm leading-relaxed">"Our campus is committed to shaping learners with intellectual discipline and ethical grounding. We welcome each student into a tradition of excellence that values scholarship, innovation, and social responsibility."</p>
        <p class="mt-4 text-sm font-semibold">Dr. [Principal Name]</p>
        <p class="text-xs text-slate-200">Principal, St. George's College Aruvithura</p>
      </aside>
    </section>

    <section class="mt-10 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">Milestones Timeline</h2>
      <div class="mt-8 grid md:grid-cols-2 gap-4 text-sm">
        <div class="rounded-xl border border-slate-200 p-4"><p class="font-semibold text-sgcNavy">1965</p><p>College established under St. George Forane Church.</p></div>
        <div class="rounded-xl border border-slate-200 p-4"><p class="font-semibold text-sgcNavy">1978</p><p>Upgraded as a full-fledged degree college.</p></div>
        <div class="rounded-xl border border-slate-200 p-4"><p class="font-semibold text-sgcNavy">1999</p><p>NAAC accredited with 4-Star rating.</p></div>
        <div class="rounded-xl border border-slate-200 p-4"><p class="font-semibold text-sgcNavy">2008</p><p>NAAC re-accreditation with Grade A.</p></div>
        <div class="rounded-xl border border-slate-200 p-4"><p class="font-semibold text-sgcNavy">2015</p><p>Golden Jubilee Block added for academic expansion.</p></div>
        <div class="rounded-xl border border-slate-200 p-4"><p class="font-semibold text-sgcNavy">2019</p><p>DST-FIST grant secured for Physics and Chemistry.</p></div>
        <div class="rounded-xl border border-slate-200 p-4 md:col-span-2"><p class="font-semibold text-sgcNavy">Latest Cycle</p><p>NAAC Reaccreditation: <strong>A++</strong>.</p></div>
      </div>
    </section>

    <section class="mt-10 grid lg:grid-cols-2 gap-6">
      <article class="rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Governance & Management</h2>
        <ul class="mt-8 space-y-3 text-sm text-slate-700">
          <li><strong>Manager:</strong> St. George Forane Church, Aruvithura</li>
          <li><strong>Governing Body:</strong> Principal, Manager Representative, Academic Council Members, IQAC Coordinator</li>
          <li><strong>Academic Council:</strong> HODs, Senior Faculty, External Experts</li>
          <li><strong>Quality Cell (IQAC):</strong> Continuous quality initiatives, accreditation compliance, outcome tracking</li>
        </ul>
      </article>

      <article class="rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Recognitions & Affiliation</h2>
        <ul class="mt-8 space-y-3 text-sm text-slate-700">
          <li><strong>Affiliation:</strong> Mahatma Gandhi University, Kottayam</li>
          <li><strong>UGC Recognition:</strong> Sections 2(f) and 12(B)</li>
          <li><strong>Institution Type:</strong> Government-aided minority institution</li>
          <li><strong>Campus Extent:</strong> 23 acres, Meenachil River belt, Erattupetta</li>
          <li><strong>Student Strength:</strong> 2,100+ across UG, PG and Integrated programs</li>
        </ul>
      </article>
    </section>
@endsection
