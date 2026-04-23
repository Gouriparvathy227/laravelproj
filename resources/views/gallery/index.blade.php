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
        <figure data-filter-item="academic,2026" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?auto=format&fit=crop&w=900&q=80" alt="Science lab practical session" /><figcaption class="p-3 text-sm">Chemistry Lab Practical - 2026</figcaption></figure>
        <figure data-filter-item="cultural,2026" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=900&q=80" alt="Arts gala stage performance" /><figcaption class="p-3 text-sm">Arts Gala Celebration - 2026</figcaption></figure>
        <figure data-filter-item="sports,2025" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=900&q=80" alt="Football match on college ground" /><figcaption class="p-3 text-sm">Intercollegiate Football - 2025</figcaption></figure>
        <figure data-filter-item="nss,2025" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&w=900&q=80" alt="NSS volunteers in outreach program" /><figcaption class="p-3 text-sm">NSS Outreach Drive - 2025</figcaption></figure>
        <figure data-filter-item="academic,2025" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=900&q=80" alt="Students in seminar hall" /><figcaption class="p-3 text-sm">Academic Seminar Series - 2025</figcaption></figure>
        <figure data-filter-item="cultural,2026" class="rounded-xl overflow-hidden border border-slate-200 bg-white"><img class="h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?auto=format&fit=crop&w=900&q=80" alt="Campus cultural festival audience" /><figcaption class="p-3 text-sm">Cultural Fest Evening - 2026</figcaption></figure>
      </div>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Video Gallery (Preview)</h2>
      <div class="mt-8 grid md:grid-cols-2 gap-4 text-sm">
        <a href="#" class="rounded-xl border border-slate-200 p-4 hover:bg-slate-50 focus-ring">College Promo Film</a>
        <a href="#" class="rounded-xl border border-slate-200 p-4 hover:bg-slate-50 focus-ring">Golden Jubilee Documentary</a>
      </div>
    </section>
@endsection
