@extends('layouts.frontend')
@section('title', 'Gallery')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Photo & Video Gallery</h1>
      <p class="mt-4 text-slate-700">Explore campus life, academic moments, sports, and cultural celebrations.</p>
    </header>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7" data-filter-group>
      <div class="flex flex-wrap gap-2">
        <button data-filter-control="all" class="rounded-full border border-slate-300 px-4 py-2 text-sm filter-active focus-ring">All</button>
        <button data-filter-control="academic" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Academic</button>
        <button data-filter-control="sports" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Sports</button>
        <button data-filter-control="cultural" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">Cultural</button>
        <button data-filter-control="nss" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">NSS</button>
        <button data-filter-control="2026" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">2026</button>
        <button data-filter-control="2025" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring">2025</button>
      </div>

      <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4 relative min-h-[420px]">
        <figure data-filter-item="academic,2026" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-graduation-1.jpeg') }}" alt="St. George's College graduation ceremony" /><figcaption class="p-3 text-sm">Graduation Ceremony - 2026</figcaption></figure>
        <figure data-filter-item="cultural,2026" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-graduation-2.jpeg') }}" alt="Cultural celebration at St. George's College" /><figcaption class="p-3 text-sm">Campus Cultural Event - 2026</figcaption></figure>
        <figure data-filter-item="sports,2025" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-1.jpeg') }}" alt="Students participating in campus sports activity" /><figcaption class="p-3 text-sm">Intercollegiate Sports - 2025</figcaption></figure>
        <figure data-filter-item="nss,2025" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-2.jpeg') }}" alt="NSS outreach activity by college students" /><figcaption class="p-3 text-sm">NSS Community Drive - 2025</figcaption></figure>
        <figure data-filter-item="academic,2025" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-3.jpeg') }}" alt="Academic gathering at St. George's College" /><figcaption class="p-3 text-sm">Academic Gathering - 2025</figcaption></figure>
        <figure data-filter-item="cultural,2026" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-4.jpeg') }}" alt="Students during campus cultural performance" /><figcaption class="p-3 text-sm">Cultural Fest Evening - 2026</figcaption></figure>
      </div>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7">
      <div class="flex flex-wrap items-center justify-between gap-3">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Video Gallery (Preview)</h2>
        <a href="https://www.youtube.com/c/SGCTV/videos" target="_blank" rel="noopener noreferrer" class="rounded-lg border border-slate-300 px-3 py-2 text-sm hover:bg-slate-50 focus-ring">Open SGC TV Channel</a>
      </div>
      <div class="mt-8 grid md:grid-cols-2 gap-6 text-sm">
        <article class="rounded-xl border border-slate-200 p-4">
          <h3 class="font-semibold text-slate-900">Campus Media Feature 1</h3>
          <div class="mt-3 aspect-video overflow-hidden rounded-lg">
            <iframe class="h-full w-full" src="https://www.youtube.com/embed/xbgtYiGdOv0" title="SGC TV video preview 1" loading="lazy" allowfullscreen></iframe>
          </div>
        </article>
        <article class="rounded-xl border border-slate-200 p-4">
          <h3 class="font-semibold text-slate-900">Campus Media Feature 2</h3>
          <div class="mt-3 aspect-video overflow-hidden rounded-lg">
            <iframe class="h-full w-full" src="https://www.youtube.com/embed/BnlBSOMnPl4" title="SGC TV video preview 2" loading="lazy" allowfullscreen></iframe>
          </div>
        </article>
      </div>
    </section>
@endsection
