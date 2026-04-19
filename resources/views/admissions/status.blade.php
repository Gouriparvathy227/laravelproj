@extends('layouts.frontend')
@section('title', 'Admissions-status')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Application Status Tracker</h1>
      <p class="mt-3 text-sm text-slate-700">Enter your application ID to view latest admission status.</p>
    </header>

    <section class="mt-6 rounded-2xl bg-white border border-slate-200 p-7">
      <form method="GET" action="{{ route('admissions.status') }}" class="space-y-4">
        <div>
          <label for="application-id-input" class="block text-sm font-medium">Application ID *</label>
          <input id="application-id-input" name="id" value="{{ $applicationId ?? '' }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" placeholder="SGC20261234" required />
        </div>
        <button type="submit" class="rounded-lg bg-sgcNavy text-white px-5 py-3 font-medium hover:bg-slate-800 focus-ring">Check Status</button>
      </form>

      @if (!empty($applicationId))
        @if ($application)
          <div class="mt-4 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-900">
            <p><strong>Application ID:</strong> {{ $application->application_id }}</p>
            <p class="mt-1"><strong>Applicant:</strong> {{ $application->full_name }}</p>
            <p class="mt-1"><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
            <p class="mt-1"><strong>Remarks:</strong> {{ $application->remarks ?: 'Application received and under review.' }}</p>
          </div>
        @else
          <div class="mt-4 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900">
            No matching application found for ID <strong>{{ $applicationId }}</strong>. Please verify your ID or contact admissions office.
          </div>
        @endif
      @endif
    </section>

    <section class="mt-6 rounded-2xl bg-white border border-slate-200 p-6">
      <h2 class="font-heading text-2xl text-sgcNavy">Need Help?</h2>
      <p class="mt-3 text-sm text-slate-700">Admissions Office: +91 4822 273 235 | <a class="underline hover:text-sgcNavy" href="mailto:admissions@sgcaruvithura.ac.in">admissions@sgcaruvithura.ac.in</a></p>
      <a href="{{ route('admissions.apply') }}" class="mt-4 inline-block rounded-lg bg-sgcGold text-white px-4 py-2 text-sm font-medium hover:bg-amber-700 focus-ring">Start New Application</a>
    </section>
@endsection
