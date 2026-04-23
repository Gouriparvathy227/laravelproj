@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
@php
  $heroSlide = $slides->first();
  $heroImage = $heroSlide ? asset('storage/' . $heroSlide->image_path) : 'https://images.unsplash.com/photo-1596495578065-6e0763fa1178?auto=format&fit=crop&w=1800&q=80';
  $heroAlt = $heroSlide?->alt_text ?: "St. George's College campus with greenery and academic buildings";
  $heroTitle = $heroSlide?->title ?: "St. George's College Aruvithura";
  $heroCaption = $heroSlide?->caption ?: "Established in 1965 under the patronage of St. George Forane Church, nurturing excellence across 17 UG and 5 PG programs on a vibrant 23-acre campus along the Meenachil River.";
@endphp
<section class="relative min-h-[68vh] overflow-hidden">
      <img src="{{ $heroImage }}" alt="{{ $heroAlt }}" class="absolute inset-0 h-full w-full object-cover" loading="eager" />
      <div class="hero-overlay absolute inset-0"></div>
      <div class="relative mx-auto max-w-7xl px-4 py-20 md:py-28 text-white">
        <p class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-xs md:text-sm tracking-wide">NAAC A++ Accredited | Affiliated to Mahatma Gandhi University</p>
        <h1 class="mt-6 text-4xl md:text-6xl leading-tight max-w-4xl">{{ $heroTitle }}</h1>
        <p class="mt-5 max-w-3xl text-base md:text-lg text-slate-100">{{ $heroCaption }}</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="{{ route('admissions.apply') }}" class="rounded-lg bg-sgcGold px-5 py-3 font-medium hover:bg-amber-700 focus-ring">Apply for Admission</a>
          <a href="{{ route('academics.index') }}" class="rounded-lg border border-white/50 px-5 py-3 font-medium hover:bg-white/10 focus-ring">Explore Programs</a>
          <a href="{{ route('contact.index') }}" class="rounded-lg border border-white/50 px-5 py-3 font-medium hover:bg-white/10 focus-ring">Contact Office</a>
        </div>
      </div>
    </section>

    <section class="bg-slate-950 text-white">
      <div class="mx-auto max-w-7xl px-4 py-3 notice-ticker" aria-label="Latest notices ticker">
        <div data-notice-ticker class="notice-ticker-track text-sm"></div>
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

    <section class="py-16 pattern-dots">
      <div class="mx-auto max-w-7xl px-4">
        <h2 class="section-title font-heading text-3xl text-sgcNavy">Departments at a Glance</h2>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
          <a href="{{ route('departments.index') }}#physics" class="panel-card rounded-xl bg-white p-4 border border-slate-200 hover:border-sgcGold focus-ring">
            <p class="font-semibold">Physics</p>
            <p class="text-sm text-slate-500">B.Sc., M.Sc.</p>
          </a>
          <a href="{{ route('departments.index') }}#chemistry" class="panel-card rounded-xl bg-white p-4 border border-slate-200 hover:border-sgcGold focus-ring">
            <p class="font-semibold">Chemistry</p>
            <p class="text-sm text-slate-500">B.Sc., M.Sc.</p>
          </a>
          <a href="{{ route('departments.index') }}#commerce" class="panel-card rounded-xl bg-white p-4 border border-slate-200 hover:border-sgcGold focus-ring">
            <p class="font-semibold">Commerce</p>
            <p class="text-sm text-slate-500">B.Com, M.Com</p>
          </a>
          <a href="{{ route('departments.index') }}#english" class="panel-card rounded-xl bg-white p-4 border border-slate-200 hover:border-sgcGold focus-ring">
            <p class="font-semibold">English</p>
            <p class="text-sm text-slate-500">B.A., M.A., Integrated</p>
          </a>
          <a href="{{ route('departments.index') }}#computer-science" class="panel-card rounded-xl bg-white p-4 border border-slate-200 hover:border-sgcGold focus-ring">
            <p class="font-semibold">Computer Science</p>
            <p class="text-sm text-slate-500">BCA</p>
          </a>
        </div>
      </div>
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
        <h2 class="section-title font-heading text-3xl text-sgcNavy">Campus Gallery Highlights</h2>
        <a href="{{ route('gallery.index') }}" class="text-sm font-semibold text-sgcNavy hover:text-sgcGold focus-ring">View Full Gallery</a>
      </div>
      <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <img class="rounded-xl h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=900&q=80" alt="Students walking through college courtyard" />
        <img class="rounded-xl h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=900&q=80" alt="Chemistry laboratory practical session" />
        <img class="rounded-xl h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=900&q=80" alt="College auditorium cultural performance" />
        <img class="rounded-xl h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=900&q=80" alt="Library reading hall with students" />
        <img class="rounded-xl h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=900&q=80" alt="Sports activities on campus ground" />
        <img class="rounded-xl h-52 w-full object-cover" loading="lazy" src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=900&q=80" alt="Academic seminar session in progress" />
      </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16">
      <h2 class="section-title font-heading text-3xl text-sgcNavy">Student Testimonials</h2>
      <p class="mt-4 text-sm text-slate-600">Experiences shared by students across departments.</p>
      <div class="mt-8 grid md:grid-cols-3 gap-4">
        @foreach($testimonials as $testimonial)
          <article class="feature-card rounded-xl border border-slate-200 bg-white p-5">
            <p class="text-sm text-slate-700">"{{ $testimonial['quote'] }}"</p>
            <p class="mt-4 font-semibold text-slate-900">{{ $testimonial['name'] }}</p>
            <p class="text-xs text-slate-500">{{ $testimonial['program'] }}</p>
          </article>
        @endforeach
      </div>
    </section>
@endsection
