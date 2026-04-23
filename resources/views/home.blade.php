@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
@php
  $fallbackHeroSlides = collect([
      [
          'image' => asset('assets/images/gallery/college-graduation-1.jpeg'),
          'alt' => "St. George's College graduation celebration",
          'title' => "St. George's College Aruvithura",
          'caption' => 'Established in 1965 under the patronage of St. George Forane Church, nurturing excellence across UG and PG programs.',
      ],
      [
          'image' => asset('assets/images/gallery/college-graduation-2.jpeg'),
          'alt' => "Campus cultural celebrations",
          'title' => 'A Vibrant Academic Community',
          'caption' => 'Learner-centered teaching, student clubs, and community-driven activities shape campus life.',
      ],
      [
          'image' => asset('assets/images/gallery/college-event-1.jpeg'),
          'alt' => "Academic event at campus",
          'title' => 'Research, Innovation, and Growth',
          'caption' => 'Departments in science, arts, commerce, and technology enable strong academic and career outcomes.',
      ],
      [
          'image' => asset('assets/images/gallery/college-event-2.jpeg'),
          'alt' => "Community service initiative",
          'title' => 'Rooted in Values',
          'caption' => 'NSS outreach and social initiatives build responsible leadership and real-world impact.',
      ],
  ]);

  $heroSlides = $slides->map(function ($slide) {
      return [
          'image' => $slide->image_url,
          'alt' => $slide->alt_text ?: "St. George's College campus",
          'title' => $slide->title ?: "St. George's College Aruvithura",
          'caption' => $slide->caption ?: 'NAAC A++ accredited institution in Kerala.',
      ];
  });

  if ($heroSlides->isEmpty()) {
      $heroSlides = $fallbackHeroSlides;
  }

  $heroTitle = $heroSlides[0]['title'];
  $heroCaption = $heroSlides[0]['caption'];
@endphp
<section class="relative min-h-[68vh] overflow-hidden">
      @foreach ($heroSlides as $index => $heroSlide)
        <img
          src="{{ $heroSlide['image'] }}"
          alt="{{ $heroSlide['alt'] }}"
          class="absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
          data-hero-slide
          data-slide-title="{{ $heroSlide['title'] }}"
          data-slide-caption="{{ $heroSlide['caption'] }}"
          loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
        />
      @endforeach
      <div class="hero-overlay absolute inset-0"></div>
      <div class="relative mx-auto max-w-7xl px-4 py-20 md:py-28 text-white">
        <p class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-xs md:text-sm tracking-wide">NAAC A++ Accredited | Affiliated to Mahatma Gandhi University</p>
        <h1 class="mt-6 text-4xl md:text-6xl leading-tight max-w-4xl" data-hero-title>{{ $heroTitle }}</h1>
        <p class="mt-5 max-w-3xl text-base md:text-lg text-slate-100" data-hero-caption>{{ $heroCaption }}</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="{{ route('admissions.apply') }}" class="rounded-lg bg-sgcGold px-5 py-3 font-medium hover:bg-amber-700 focus-ring">Apply for Admission</a>
          <a href="{{ route('academics.index') }}" class="rounded-lg border border-white/50 px-5 py-3 font-medium hover:bg-white/10 focus-ring">Explore Programs</a>
          <a href="{{ route('contact.index') }}" class="rounded-lg border border-white/50 px-5 py-3 font-medium hover:bg-white/10 focus-ring">Contact Office</a>
          <a href="https://wa.me/914822273235?text=Hello%20St.%20George%27s%20College%20Aruvithura%2C%20I%20need%20admission%20support." target="_blank" rel="noopener noreferrer" class="rounded-lg border border-white/50 px-5 py-3 font-medium hover:bg-white/10 focus-ring inline-flex items-center gap-2" aria-label="Chat on WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-5 w-5" fill="currentColor" aria-hidden="true">
              <path d="M16.02 3.2c-7.03 0-12.73 5.7-12.73 12.73 0 2.25.59 4.45 1.7 6.39l-1.81 6.61 6.77-1.77a12.7 12.7 0 0 0 6.07 1.55h.01c7.03 0 12.73-5.7 12.73-12.73S23.05 3.2 16.02 3.2Zm0 23.35h-.01a10.56 10.56 0 0 1-5.38-1.47l-.39-.23-4.02 1.05 1.07-3.92-.26-.4a10.55 10.55 0 1 1 8.99 4.97Zm5.79-7.89c-.32-.16-1.88-.93-2.17-1.03-.29-.11-.5-.16-.71.16-.21.32-.81 1.03-.99 1.24-.18.21-.36.24-.68.08-.32-.16-1.35-.5-2.57-1.6-.95-.85-1.59-1.9-1.78-2.22-.19-.32-.02-.49.14-.65.14-.14.32-.36.48-.53.16-.19.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.71-.98-2.34-.25-.6-.51-.52-.71-.52h-.6c-.21 0-.56.08-.85.4-.29.32-1.12 1.09-1.12 2.66 0 1.57 1.15 3.08 1.31 3.29.16.21 2.25 3.43 5.45 4.81.76.33 1.35.53 1.81.68.76.24 1.45.21 2 .13.61-.09 1.88-.77 2.14-1.52.27-.75.27-1.39.19-1.52-.08-.14-.29-.22-.61-.38Z"/>
            </svg>
            WhatsApp Help
          </a>
        </div>
        @if ($heroSlides->count() > 1)
          <div class="mt-8 flex items-center gap-2" aria-label="Homepage slider controls">
            @foreach ($heroSlides as $index => $heroSlide)
              <button type="button" class="h-2.5 w-2.5 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/40' }}" data-hero-dot="{{ $index }}" aria-label="Show slide {{ $index + 1 }}"></button>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    <section class="bg-primary text-white py-2 marquee-container" aria-label="College marquee">
      <div class="mx-auto max-w-7xl px-4">
        <div class="marquee-track text-sm md:text-base font-medium">
          Welcome to St. George's College | NAAC A++ | Admissions Open 2026 &nbsp; | &nbsp; Welcome to St. George's College | NAAC A++ | Admissions Open 2026
        </div>
      </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16">
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <article class="stat-card rounded-2xl bg-white p-6 shadow border border-slate-100">
          <p class="text-slate-500 text-sm">Students</p>
          <p class="mt-2 text-4xl font-bold text-sgcNavy" data-count="2100" data-suffix="+">0+</p>
        </article>
        <article class="stat-card rounded-2xl bg-white p-6 shadow border border-slate-100">
          <p class="text-slate-500 text-sm">Departments</p>
          <p class="mt-2 text-4xl font-bold text-sgcNavy" data-count="15" data-suffix="">0</p>
        </article>
        <article class="stat-card rounded-2xl bg-white p-6 shadow border border-slate-100">
          <p class="text-slate-500 text-sm">Years of Legacy</p>
          <p class="mt-2 text-4xl font-bold text-sgcNavy" data-count="58" data-suffix="+">0+</p>
        </article>
        <article class="stat-card rounded-2xl bg-white p-6 shadow border border-slate-100">
          <p class="text-slate-500 text-sm">NAAC Grade</p>
          <p class="mt-2 text-4xl font-bold text-sgcNavy">A++</p>
        </article>
      </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-16 grid lg:grid-cols-3 gap-8">
      <article class="lg:col-span-2 rounded-2xl bg-white p-7 shadow border border-slate-100">
        <h2 class="section-title font-heading text-3xl text-sgcNavy">Upcoming Events</h2>
        <div class="mt-8 grid md:grid-cols-3 gap-4">
          <div class="feature-card rounded-xl border border-slate-200 p-4">
            <p class="text-xs text-slate-500">24 April 2026</p>
            <h3 class="mt-2 font-semibold text-slate-900">International Women's Day Commemoration</h3>
            <p class="mt-2 text-sm text-slate-600">Women's Cell and NSS joint cultural awareness event in Golden Jubilee Block.</p>
          </div>
          <div class="feature-card rounded-xl border border-slate-200 p-4">
            <p class="text-xs text-slate-500">02 May 2026</p>
            <h3 class="mt-2 font-semibold text-slate-900">Placement Readiness Bootcamp</h3>
            <p class="mt-2 text-sm text-slate-600">Training session with alumni mentors for IT and banking recruiter interviews.</p>
          </div>
          <div class="feature-card rounded-xl border border-slate-200 p-4">
            <p class="text-xs text-slate-500">10 May 2026</p>
            <h3 class="mt-2 font-semibold text-slate-900">Interdepartmental Research Expo</h3>
            <p class="mt-2 text-sm text-slate-600">Showcasing DST-FIST supported work by Physics and Chemistry research centers.</p>
          </div>
        </div>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-7 shadow-lg">
        <h2 class="font-heading text-2xl">Quick Access</h2>
        <div class="mt-6 grid gap-3 text-sm">
          <a class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring" href="{{ route('admissions.index') }}">Admissions 2026</a>
          <a class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring" href="{{ route('academics.index') }}">UG/PG Programs</a>
          <a class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring" href="{{ route('notices.index') }}">Results & Notices</a>
          <a class="rounded-lg bg-white/10 px-4 py-3 hover:bg-white/20 focus-ring" href="{{ route('contact.index') }}">Contact Directory</a>
          <a class="rounded-lg bg-sgcGold px-4 py-3 text-center font-medium hover:bg-amber-700 focus-ring" href="{{ route('admissions.apply') }}">Apply Now</a>
        </div>
      </aside>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">Top Recruiters</h2>
      <div class="mt-8 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-3">
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">TCS</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">Infosys</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">Wipro</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">Cognizant</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">HCL</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">Deloitte</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">Capgemini</div>
        <div class="rounded-lg bg-white border border-slate-200 p-3 text-center font-medium text-slate-700">South Indian Bank</div>
      </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-8">
      <div class="flex items-end justify-between gap-4">
        <h2 class="section-title font-heading text-3xl text-sgcNavy">St. George's College Gallery</h2>
        <a href="{{ route('gallery.index') }}" class="text-sm font-semibold text-sgcNavy hover:text-sgcGold focus-ring">View Full Gallery</a>
      </div>
      <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <figure class="overflow-hidden rounded-xl transition-transform duration-300 hover:scale-105 hover:shadow-xl">
          <img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-graduation-1.jpeg') }}" alt="Students during graduation at St. George's College" />
        </figure>
        <figure class="overflow-hidden rounded-xl transition-transform duration-300 hover:scale-105 hover:shadow-xl">
          <img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-graduation-2.jpeg') }}" alt="Campus celebration at St. George's College" />
        </figure>
        <figure class="overflow-hidden rounded-xl transition-transform duration-300 hover:scale-105 hover:shadow-xl">
          <img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-1.jpeg') }}" alt="Academic event at St. George's College" />
        </figure>
        <figure class="overflow-hidden rounded-xl transition-transform duration-300 hover:scale-105 hover:shadow-xl">
          <img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-2.jpeg') }}" alt="NSS and community engagement activity" />
        </figure>
        <figure class="overflow-hidden rounded-xl transition-transform duration-300 hover:scale-105 hover:shadow-xl">
          <img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-3.jpeg') }}" alt="Students at campus program" />
        </figure>
        <figure class="overflow-hidden rounded-xl transition-transform duration-300 hover:scale-105 hover:shadow-xl">
          <img class="h-52 w-full object-cover" loading="lazy" src="{{ asset('assets/images/gallery/college-event-4.jpeg') }}" alt="College cultural evening performance" />
        </figure>
      </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16">
      <div class="py-8" x-data="{
        active: 0,
        items: 5,
        next() { this.active = (this.active + 1) % this.items },
        prev() { this.active = (this.active - 1 + this.items) % this.items }
      }" x-init="setInterval(() => next(), 4000)">
        <h2 class="text-2xl font-bold text-center text-[#1B3A6B] mb-6">What Our Alumni Say</h2>

        <div class="relative overflow-hidden max-w-xl mx-auto">
          <template x-for="(item, index) in [0,1,2,3,4]" :key="index">
            <div
              x-show="active === index"
              x-transition:enter="transition ease-out duration-500"
              x-transition:enter-start="translate-x-full opacity-0"
              x-transition:enter-end="translate-x-0 opacity-100"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-start="translate-x-0 opacity-100"
              x-transition:leave-end="-translate-x-full opacity-0"
              class="rounded-xl p-5 shadow-md bg-[#F5C518] text-gray-900">
              <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-[#1B3A6B] text-white flex items-center justify-center font-bold text-sm flex-shrink-0" x-text="['AM','RK','SV','AM','DN'][index]"></div>
                <div>
                  <p class="font-semibold text-sm" x-text="['Anjali Mohan','Rahul Krishnan','Sneha Varghese','Arun Mathew','Divya Nair'][index]"></p>
                  <p class="text-xs text-gray-600" x-text="['B.Sc Computer Science, 2023','BBA, 2022','B.Com, 2024','M.Sc Physics, 2023','B.Sc Maths, 2022'][index]"></p>
                </div>
              </div>

              <p class="text-sm italic leading-relaxed" x-text="[
                'St. George\\'s gave me the foundation to land my dream job at TCS. The faculty here are truly dedicated.',
                'The campus life and placement support at St. George\\'s College is unmatched in the region.',
                'I loved every moment here. The faculty mentorship helped me clear my CA Foundation in the first attempt.',
                'World-class infrastructure and a community that pushes you to excel. Proud to be a Georgian.',
                'The cultural fests and NSS activities shaped my personality as much as the academics did.'
              ][index]"></p>
            </div>
          </template>

          <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 bg-[#1B3A6B] text-white rounded-full w-7 h-7 flex items-center justify-center text-xs -ml-3" aria-label="Previous testimonial">&lsaquo;</button>
          <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 bg-[#1B3A6B] text-white rounded-full w-7 h-7 flex items-center justify-center text-xs -mr-3" aria-label="Next testimonial">&rsaquo;</button>
        </div>

        <div class="flex justify-center gap-2 mt-4">
          <template x-for="i in [0,1,2,3,4]" :key="i">
            <button @click="active=i" :class="active===i ? 'bg-[#1B3A6B] w-4' : 'bg-gray-300 w-2'" class="h-2 rounded-full transition-all duration-300"></button>
          </template>
        </div>
      </div>
    </section>
@endsection
