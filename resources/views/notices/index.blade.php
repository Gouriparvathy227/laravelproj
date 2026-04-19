@extends('layouts.frontend')
@section('title', 'Notices-events')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Notices & Events</h1>
      <p class="mt-4 text-slate-700">Stay updated on exam notifications, admissions announcements, scholarships, and campus events.</p>
    </header>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7" data-filter-group>
      <div class="flex flex-wrap gap-2">
        <button data-filter-control="all" class="rounded-full border border-slate-300 px-4 py-2 text-sm filter-active focus-ring">All</button>
        <button data-filter-control="exam" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Exam</button>
        <button data-filter-control="admission" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Admission</button>
        <button data-filter-control="event" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Event</button>
        <button data-filter-control="scholarship" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Scholarship</button>
        <button data-filter-control="general" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">General</button>
      </div>

      <div class="mt-6 grid md:grid-cols-2 gap-4 relative min-h-[320px]">
        <article data-filter-item="exam" class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
          <p class="text-xs text-slate-500">Exam | Published: 13 Apr 2026</p>
          <h2 class="mt-2 font-semibold text-slate-900">Semester VI Model Examination Timetable</h2>
          <p class="mt-2 text-sm text-slate-600">Hall ticket publication schedule and exam room details are now available.</p>
        </article>
        <article data-filter-item="admission" class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
          <p class="text-xs text-slate-500">Admission | Published: 11 Apr 2026</p>
          <h2 class="mt-2 font-semibold text-slate-900">UG/PG Admission Portal Open</h2>
          <p class="mt-2 text-sm text-slate-600">CAP-linked online application process is active for 2026 intake.</p>
        </article>
        <article data-filter-item="scholarship" class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
          <p class="text-xs text-slate-500">Scholarship | Published: 09 Apr 2026</p>
          <h2 class="mt-2 font-semibold text-slate-900">Chief Minister Scholarship Verification</h2>
          <p class="mt-2 text-sm text-slate-600">Eligible students should complete document verification before 20 April.</p>
        </article>
        <article data-filter-item="event" class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
          <p class="text-xs text-slate-500">Event | Published: 08 Apr 2026</p>
          <h2 class="mt-2 font-semibold text-slate-900">Arts Gala 2026 Registration</h2>
          <p class="mt-2 text-sm text-slate-600">Department-level registrations open for music, theatre, and fine arts events.</p>
        </article>
        <article data-filter-item="general" class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
          <p class="text-xs text-slate-500">General | Published: 07 Apr 2026</p>
          <h2 class="mt-2 font-semibold text-slate-900">Campus Closed for Maintenance</h2>
          <p class="mt-2 text-sm text-slate-600">Selected blocks will be closed this weekend for electrical maintenance.</p>
        </article>
        <article data-filter-item="event" class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
          <p class="text-xs text-slate-500">Event | Published: 05 Apr 2026</p>
          <h2 class="mt-2 font-semibold text-slate-900">NSS Community Outreach Drive</h2>
          <p class="mt-2 text-sm text-slate-600">Volunteers invited for environmental and social awareness activities.</p>
        </article>
      </div>
    </section>

    <section class="mt-8 grid lg:grid-cols-2 gap-6">
      <article class="rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Upcoming Events Calendar</h2>
        <ul class="mt-8 text-sm text-slate-700 space-y-3">
          <li><strong>24 Apr:</strong> International Women's Day Commemoration</li>
          <li><strong>02 May:</strong> Placement Readiness Bootcamp</li>
          <li><strong>10 May:</strong> Interdepartmental Research Expo</li>
          <li><strong>18 May:</strong> Alumni Knowledge Summit</li>
        </ul>
        <a href="https://sgcaruvithura.ac.in/Assets/downloads/Files/001726700%201690449588-INTERNAL-exam-calendar-2021-22.pdf" target="_blank" rel="noopener noreferrer" class="mt-6 inline-block rounded-lg border border-slate-300 px-4 py-2 text-sm hover:bg-slate-50 focus-ring">Download Academic Calendar PDF</a>
      </article>

      <article class="rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Exam & Hall Ticket Links</h2>
        <div class="mt-8 space-y-3 text-sm">
          <a href="https://sgcaruvithura.ac.in/Assets/downloads/Files/0.87129600%201624854240Time%20Table%20VI%20Sem%20CBCS%20Regular%20(1).pdf" target="_blank" rel="noopener noreferrer" class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50 focus-ring">Semester VI Hall Ticket Download</a>
          <a href="https://sgcaruvithura.ac.in/notification" target="_blank" rel="noopener noreferrer" class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50 focus-ring">University Exam Notification (MGU)</a>
          <a href="https://sgcaruvithura.ac.in/examinations.html?id=3" target="_blank" rel="noopener noreferrer" class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50 focus-ring">Internal Assessment Schedule</a>
        </div>
      </article>
    </section>
@endsection
