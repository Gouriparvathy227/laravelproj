<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Official website of St. George's College Aruvithura, NAAC A++ accredited institution in Kerala." />

    <title>{{ config('app.name', 'St. George\'s College') }} - @yield('title', 'Home')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              sgcPrimary: '#1B3A6B',
              sgcGold: '#C8952A',
              sgcAccent: '#16A085'
            }
          }
        }
      };
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
</head>
<body data-page="@yield('page', 'home')" class="bg-campus">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 bg-white px-3 py-2 rounded-md">Skip to content</a>
  <div class="min-h-screen w-full">
  <div class="site-topbar text-xs md:text-sm">
    <div class="mx-auto max-w-7xl px-4 py-2 flex flex-wrap items-center justify-between gap-2">
      <p>Affiliated to Mahatma Gandhi University, Kottayam | NAAC A++ Accredited</p>
      <div class="flex items-center gap-4">
        <a class="hover:text-amber-300 focus-ring" href="mailto:info@sgcaruvithura.ac.in">info@sgcaruvithura.ac.in</a>
        <span>+91 4822 273 235</span>
      </div>
    </div>
  </div>
  <header class="site-header sticky top-0 z-40">
    <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between gap-4">
      <a href="{{ url('/') }}" class="flex items-center gap-3 focus-ring">
        <img src="{{ asset('assets/images/logo.png') }}" alt="St. George's College" class="h-12 w-auto object-contain" loading="eager" />
        <div>
          <p class="font-heading text-lg leading-tight text-white">St. George's College Aruvithura</p>
          <p class="text-xs text-white/80">Since 1965 | Erattupetta, Kerala</p>
        </div>
      </a>
      <button id="mobile-menu-btn" class="md:hidden px-3 py-2 border border-white/40 text-white rounded-lg focus-ring" aria-controls="site-nav" aria-expanded="false">Menu</button>
      <nav id="site-nav" class="hidden md:flex items-center gap-5 text-sm font-medium text-white" aria-label="Primary">
        <a href="{{ route('home') }}" class="focus-ring nav-link {{ request()->routeIs('home') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Home</a>
        <a href="{{ route('about') }}" class="focus-ring nav-link {{ request()->routeIs('about') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">About</a>
        <a href="{{ route('academics.index') }}" class="focus-ring nav-link {{ request()->routeIs('academics.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Academics</a>
        <a href="{{ route('departments.index') }}" class="focus-ring nav-link {{ request()->routeIs('departments.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Departments</a>
        <a href="{{ route('admissions.index') }}" class="focus-ring nav-link {{ request()->routeIs('admissions.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Admissions</a>
        <a href="{{ route('placements.index') }}" class="focus-ring nav-link {{ request()->routeIs('placements.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Placements</a>
        <a href="{{ route('facilities') }}" class="focus-ring nav-link {{ request()->routeIs('facilities') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Facilities</a>
        <a href="{{ route('notices.index') }}" class="focus-ring nav-link {{ request()->routeIs('notices.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Notices</a>
        <a href="{{ route('gallery.index') }}" class="focus-ring nav-link {{ request()->routeIs('gallery.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Gallery</a>
        <a href="{{ route('contact.index') }}" class="focus-ring nav-link {{ request()->routeIs('contact.*') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Contact</a>
        @guest
          <a href="{{ route('login') }}" class="focus-ring nav-link {{ request()->routeIs('login') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Login</a>
        @else
          <a href="{{ route('dashboard') }}" class="focus-ring nav-link {{ request()->routeIs('dashboard') ? 'border-b-2 border-[#C8952A] pb-1 text-white' : '' }}">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="focus-ring nav-link">Logout</button>
          </form>
        @endguest
        <a href="{{ url('/admissions/apply') }}" class="nav-apply focus-ring">Quick Apply</a>
      </nav>
    </div>
    <nav id="mobile-nav-panel" class="site-mobile-panel md:hidden hidden px-4 py-3" aria-label="Mobile Primary">
      <div class="grid gap-2 text-sm">
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('home') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('home') }}">Home</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('about') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('about') }}">About</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('academics.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('academics.index') }}">Academics</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('departments.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('departments.index') }}">Departments</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('admissions.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('admissions.index') }}">Admissions</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('placements.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('placements.index') }}">Placements</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('facilities') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('facilities') }}">Facilities</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('notices.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('notices.index') }}">Notices</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('gallery.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('gallery.index') }}">Gallery</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('contact.*') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('contact.index') }}">Contact</a>
        @guest
          <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('login') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('login') }}">Login</a>
        @else
          <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring {{ request()->routeIs('dashboard') ? 'border-b-2 border-[#C8952A] text-white' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-2 py-2 rounded hover:bg-slate-100 focus-ring">Logout</button>
          </form>
        @endguest
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/admissions/apply') }}">Apply Online</a>
      </div>
    </nav>
  </header>

  <main id="main-content" class="relative">
    @yield('content')
  </main>

  <footer class="site-footer mt-16">
    <div class="mx-auto max-w-7xl px-4 py-12 grid md:grid-cols-4 gap-8">
      <div>
        <h3 class="font-heading text-xl mb-3 text-white">St. George's College Aruvithura</h3>
        <p class="text-sm leading-relaxed text-white/90">Government-aided minority institution established in 1965, serving 2,100+ students with NAAC A++ excellence.</p>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-[var(--color-secondary)]">Quick Links</h4>
        <ul class="columns-2 space-y-1 text-sm text-white/90">
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('home') }}">Home</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('about') }}">About</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('departments.index') }}">Departments</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('admissions.index') }}">Admissions</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('faculty.index') }}">Faculty</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('gallery.index') }}">Gallery</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('placements.index') }}">Placements</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('notices.index') }}">Notices</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('contact.index') }}">Contact</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('student-life') }}">Student Life</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('facilities') }}">Facilities</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('history') }}">History</a></li>
          <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('login') }}">Admin Login</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-[var(--color-secondary)]">Portals</h4>
        <ul class="space-y-2 text-sm text-white/90">
          @auth
            @if(auth()->user()->role === 'student')
              <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ url('/student/dashboard') }}">Student Portal</a></li>
            @elseif(auth()->user()->role === 'faculty')
              <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ url('/faculty/dashboard') }}">Faculty Portal</a></li>
            @else
              <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('dashboard') }}">Dashboard</a></li>
            @endif
          @else
            <li><a class="hover:text-[var(--color-secondary)] focus-ring" href="{{ route('admissions.apply') }}">Apply Online</a></li>
          @endauth
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-[var(--color-secondary)]">Contact</h4>
        <p class="text-sm text-white/90">Aruvithura, Erattupetta, Kottayam District, Kerala 686122</p>
        <p class="text-sm mt-2 text-white/90">Phone: +91 4822 273 235</p>
        <p class="text-sm text-white/90">Email: <a class="underline hover:text-[var(--color-secondary)] focus-ring" href="mailto:info@sgcaruvithura.ac.in">info@sgcaruvithura.ac.in</a></p>
      </div>
    </div>
    <div class="border-t border-white/20 py-4 text-center text-xs text-white/75">
      <p>&copy; <span id="year"></span> {{ config('app.name') }}. All rights reserved.</p>
    </div>
  </footer>

  <script src="{{ asset('assets/js/main.js') }}"></script>
  </div>
</body>
</html>
