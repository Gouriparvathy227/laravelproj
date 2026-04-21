@extends('layouts.frontend')
@section('title', 'Notices-events')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Notices & Events</h1>
      <p class="mt-4 text-slate-700">Stay updated on exam notifications, admissions announcements, scholarships, and campus events.</p>
    </header>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7" x-data="{ f: '{{ $activeCategory }}', items: {{ \Illuminate\Support\Js::from($notices) }} }">
      <div class="flex flex-wrap gap-2">
        <button @click="f = 'all'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'all' ? 'filter-active' : ''">All</button>
        <button @click="f = 'exam'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'exam' ? 'filter-active' : ''">Exam</button>
        <button @click="f = 'admission'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'admission' ? 'filter-active' : ''">Admission</button>
        <button @click="f = 'event'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'event' ? 'filter-active' : ''">Event</button>
        <button @click="f = 'scholarship'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'scholarship' ? 'filter-active' : ''">Scholarship</button>
        <button @click="f = 'general'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'general' ? 'filter-active' : ''">General</button>
      </div>

      <div class="mt-6 grid md:grid-cols-2 gap-4">
        <template x-for="notice in items.filter(i => f === 'all' || i.category === f)" :key="`${notice.category}-${notice.title}`">
          <article class="feature-card rounded-xl border border-slate-200 p-5 bg-white">
            <p class="text-xs text-slate-500" x-text="`${notice.category.charAt(0).toUpperCase() + notice.category.slice(1)} | Published: ${notice.published}`"></p>
            <h2 class="mt-2 font-semibold text-slate-900" x-text="notice.title"></h2>
            <p class="mt-2 text-sm text-slate-600" x-text="notice.body"></p>
          </article>
        </template>
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
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Exam & Timetable Links</h2>
        <div class="mt-8 space-y-3 text-sm">
          <a href="{{ route('notices.view', 'semester-vi-timetable-download') }}" class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50 focus-ring">Timetable Download</a>
          <a href="{{ route('notices.view', 'university-exam-notification') }}" class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50 focus-ring">University Exam Notification (MGU)</a>
          <a href="{{ route('notices.view', 'internal-assessment-schedule') }}" class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50 focus-ring">Internal Assessment Schedule</a>
        </div>
      </article>
    </section>
@endsection
