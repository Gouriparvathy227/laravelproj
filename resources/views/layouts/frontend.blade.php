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
              sgcNavy: '#1A3E6F',
              sgcGold: '#B8860B'
            }
          }
        }
      };
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
</head>
<body data-page="@yield('page', 'home')" class="bg-campus">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 bg-white px-3 py-2 rounded-md">Skip to content</a>
  
  <div class="text-white text-xs md:text-sm" style="background-color: var(--sgc-navy);">
    <div class="mx-auto max-w-7xl px-4 py-2 flex flex-wrap items-center justify-between gap-2">
      <p>Affiliated to Mahatma Gandhi University, Kottayam | NAAC A++ Accredited</p>
      <div class="flex items-center gap-4">
        <a class="hover:text-amber-300 focus-ring" href="mailto:info@sgcaruvithura.ac.in">info@sgcaruvithura.ac.in</a>
        <span>+91 4822 273 235</span>
      </div>
    </div>
  </div>
  <header class="bg-white/95 backdrop-blur border-b border-slate-200 sticky top-0 z-40">
    <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between gap-4">
      <a href="{{ url('/') }}" class="flex items-center gap-3 focus-ring">
        <img src="{{ asset('assets/images/brand/college-logo.png') }}" alt="St. George's College logo" class="h-12 w-12 rounded-full object-cover border border-slate-200" loading="eager" />
        <div>
          <p class="font-heading text-lg leading-tight" style="color: var(--sgc-navy);">St. George's College Aruvithura</p>
          <p class="text-xs text-slate-500">Since 1965 | Erattupetta, Kerala</p>
        </div>
      </a>
      <button id="mobile-menu-btn" class="md:hidden px-3 py-2 border border-slate-300 rounded-lg focus-ring" aria-controls="site-nav" aria-expanded="false">Menu</button>
      <nav id="site-nav" class="hidden md:flex items-center gap-5 text-sm font-medium" aria-label="Primary">
        <a href="{{ url('/') }}" class="focus-ring {{ request()->is('/') ? 'nav-active' : 'nav-link' }}">Home</a>
        <a href="{{ url('/about') }}" class="focus-ring {{ request()->is('about') ? 'nav-active' : 'nav-link' }}">About</a>
        <a href="{{ url('/academics') }}" class="focus-ring {{ request()->is('academics*') ? 'nav-active' : 'nav-link' }}">Academics</a>
        <a href="{{ url('/departments') }}" class="focus-ring {{ request()->is('departments*') ? 'nav-active' : 'nav-link' }}">Departments</a>
        <a href="{{ url('/admissions') }}" class="focus-ring {{ request()->is('admissions*') ? 'nav-active' : 'nav-link' }}">Admissions</a>
        <a href="{{ url('/placements') }}" class="focus-ring {{ request()->is('placements*') ? 'nav-active' : 'nav-link' }}">Placements</a>
        <a href="{{ url('/facilities') }}" class="focus-ring {{ request()->is('facilities') ? 'nav-active' : 'nav-link' }}">Facilities</a>
        <a href="{{ url('/notices') }}" class="focus-ring {{ request()->is('notices*') ? 'nav-active' : 'nav-link' }}">Notices</a>
        <a href="{{ url('/gallery') }}" class="focus-ring {{ request()->is('gallery*') ? 'nav-active' : 'nav-link' }}">Gallery</a>
        <a href="{{ url('/contact') }}" class="focus-ring {{ request()->is('contact') ? 'nav-active' : 'nav-link' }}">Contact</a>
        @guest
          <a href="{{ route('login') }}" class="focus-ring {{ request()->is('login') ? 'nav-active' : 'nav-link' }}">Login</a>
        @else
          <a href="{{ route('dashboard') }}" class="focus-ring {{ request()->is('dashboard') ? 'nav-active' : 'nav-link' }}">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="focus-ring nav-link">Logout</button>
          </form>
        @endguest
        <a href="{{ url('/admissions/apply') }}" class="nav-apply focus-ring">Quick Apply</a>
      </nav>
    </div>
    <nav id="mobile-nav-panel" class="md:hidden hidden border-t border-slate-200 px-4 py-3 bg-white" aria-label="Mobile Primary">
      <div class="grid gap-2 text-sm">
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/') }}">Home</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/about') }}">About</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/academics') }}">Academics</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/departments') }}">Departments</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/admissions') }}">Admissions</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/placements') }}">Placements</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/facilities') }}">Facilities</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/notices') }}">Notices</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/gallery') }}">Gallery</a>
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/contact') }}">Contact</a>
        @guest
          <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ route('login') }}">Login</a>
        @else
          <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ route('dashboard') }}">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-2 py-2 rounded hover:bg-slate-100 focus-ring">Logout</button>
          </form>
        @endguest
        <a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="{{ url('/admissions/apply') }}">Apply Online</a>
      </div>
    </nav>
  </header>

  <main id="main-content">
    @yield('content')
  </main>

  <footer class="text-slate-100 mt-16" style="background-color: var(--sgc-navy);">
    <div class="mx-auto max-w-7xl px-4 py-12 grid md:grid-cols-4 gap-8">
      <div>
        <h3 class="font-heading text-xl mb-3">St. George's College Aruvithura</h3>
        <p class="text-sm leading-relaxed">Government-aided minority institution established in 1965, serving 2,100+ students with NAAC A++ excellence.</p>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-amber-300">Quick Links</h4>
        <ul class="space-y-2 text-sm">
          <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/admissions') }}">Admissions</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/academics') }}">Programs & Syllabus</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/notices') }}">Notices & Events</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/contact') }}">Contact Directory</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-amber-300">Portals</h4>
        <ul class="space-y-2 text-sm">
          @auth
            @if(auth()->user()->role === 'student')
              <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/student/dashboard') }}">Student Portal</a></li>
            @elseif(auth()->user()->role === 'faculty')
              <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/faculty-portal/dashboard') }}">Faculty Portal</a></li>
            @else
              <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/login') }}">Login Portal</a></li>
            @endif
          @else
            <li><a class="hover:text-amber-300 focus-ring" href="{{ url('/login') }}">Login Portal</a></li>
          @endauth
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-amber-300">Contact</h4>
        <p class="text-sm">Aruvithura, Erattupetta, Kottayam District, Kerala 686122</p>
        <p class="text-sm mt-2">Phone: +91 4822 273 235</p>
        <p class="text-sm">Email: <a class="underline hover:text-amber-300 focus-ring" href="mailto:info@sgcaruvithura.ac.in">info@sgcaruvithura.ac.in</a></p>
      </div>
    </div>
    <div class="border-t border-white/20 py-4 text-center text-xs text-slate-300">
      <p>&copy; <span id="year"></span> {{ config('app.name') }}. All rights reserved.</p>
    </div>
  </footer>

  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
