@extends('layouts.frontend')
@section('title', 'Gallery')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Photo & Video Gallery</h1>
      <p class="mt-4 text-slate-700">Explore campus life, academic moments, sports, and cultural celebrations.</p>
    </header>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7" x-data="{ f: 'all', items: {{ \Illuminate\Support\Js::from($galleries) }} }">
      <div class="flex flex-wrap gap-2">
        <button @click="f = 'all'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'all' ? 'filter-active' : ''">All</button>
        <button @click="f = 'academic'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'academic' ? 'filter-active' : ''">Academic</button>
        <button @click="f = 'sports'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'sports' ? 'filter-active' : ''">Sports</button>
        <button @click="f = 'cultural'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'cultural' ? 'filter-active' : ''">Cultural</button>
        <button @click="f = 'nss'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === 'nss' ? 'filter-active' : ''">NSS</button>
        <button @click="f = '2026'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === '2026' ? 'filter-active' : ''">2026</button>
        <button @click="f = '2025'" class="rounded-full border border-slate-300 px-4 py-2 text-sm focus-ring" :class="f === '2025' ? 'filter-active' : ''">2025</button>
      </div>

      <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <template x-for="item in items.filter(i => f === 'all' || i.category === f || i.year == f)" :key="`${item.title}-${item.year}`">
          <figure class="rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm">
            <img class="h-52 w-full object-cover" loading="lazy" :src="item.image" :alt="item.title" />
            <figcaption class="p-3 text-sm">
              <span x-text="item.title"></span>
            </figcaption>
          </figure>
        </template>
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
