@extends('layouts.frontend')
@section('title', 'Admissions-status')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Application Status Tracker</h1>
      <p class="mt-3 text-sm text-slate-700">Enter your application ID to view latest admission status.</p>
      <p class="mt-2 text-xs text-slate-500">Demo IDs: SGC2026001, SGC2026002, SGC2026003, SGC2026004</p>
    </header>

    <section class="mt-6 rounded-2xl bg-white border border-slate-200 p-7">
      <form id="admission-status-form" class="space-y-4">
        <div>
          <label for="application-id-input" class="block text-sm font-medium">Application ID *</label>
          <input id="application-id-input" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" placeholder="SGC2026001" required />
        </div>
        <button type="submit" class="rounded-lg bg-sgcNavy text-white px-5 py-3 font-medium hover:bg-slate-800 focus-ring">Check Status</button>
      </form>
      <div id="admission-status-result" class="mt-4 text-sm"></div>
    </section>

    <section class="mt-6 rounded-2xl bg-white border border-slate-200 p-6">
      <h2 class="font-heading text-2xl text-sgcNavy">Need Help?</h2>
      <p class="mt-3 text-sm text-slate-700">Admissions Office: +91 4822 273 235 | admissions@sgcaruvithura.ac.in</p>
      <a href="{{ route('admissions.apply') }}" class="mt-4 inline-block rounded-lg bg-sgcGold text-white px-4 py-2 text-sm font-medium hover:bg-amber-700 focus-ring">Start New Application</a>
    </section>
@endsection
