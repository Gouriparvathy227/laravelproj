@extends('layouts.frontend')
@section('title', 'Admissions-apply')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Online Admission Application</h1>
      <p class="mt-3 text-sm text-slate-700">Complete all mandatory fields and upload documents in PDF format (max 5 MB each).</p>
    </header>

    @if (session('success'))
      <div class="mt-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mt-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
        <p class="font-semibold">Please correct the highlighted issues:</p>
        <ul class="mt-2 list-disc pl-5 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admissions.store') }}" enctype="multipart/form-data" class="mt-6 rounded-2xl bg-white border border-slate-200 p-7 space-y-8">
      @csrf
      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Personal Information</h2>
        <div class="mt-5 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="full_name">Full Name *</label><input class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" id="full_name" name="full_name" value="{{ old('full_name') }}" required /></div>
          <div><label class="block text-sm font-medium" for="dob">Date of Birth *</label><input type="date" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" id="dob" name="dob" value="{{ old('dob') }}" required /></div>
          <div><label class="block text-sm font-medium" for="gender">Gender *</label><select id="gender" name="gender" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select</option><option value="Male" @selected(old('gender') === 'Male')>Male</option><option value="Female" @selected(old('gender') === 'Female')>Female</option><option value="Other" @selected(old('gender') === 'Other')>Other</option></select></div>
          <div><label class="block text-sm font-medium" for="category">Category *</label><select id="category" name="category" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select</option><option value="General" @selected(old('category') === 'General')>General</option><option value="SC" @selected(old('category') === 'SC')>SC</option><option value="ST" @selected(old('category') === 'ST')>ST</option><option value="OBC" @selected(old('category') === 'OBC')>OBC</option><option value="Minority" @selected(old('category') === 'Minority')>Minority</option></select></div>
          <div><label class="block text-sm font-medium" for="religion">Religion</label><input id="religion" name="religion" value="{{ old('religion') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" /></div>
          <div><label class="block text-sm font-medium" for="phone">Phone *</label><input id="phone" name="phone" type="tel" value="{{ old('phone') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="email">Email *</label><input id="email" name="email" type="email" value="{{ old('email') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div class="md:col-span-2"><label class="block text-sm font-medium" for="address">Address *</label><textarea id="address" name="address" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" rows="3" required>{{ old('address') }}</textarea></div>
        </div>
      </section>

      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Academic Information</h2>
        <div class="mt-5 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="school">10+2 School Name *</label><input id="school" name="school" value="{{ old('school') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="board">Board *</label><input id="board" name="board" value="{{ old('board') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="pass_year">Year of Passing *</label><input id="pass_year" name="pass_year" type="number" min="2010" max="{{ now()->year }}" value="{{ old('pass_year') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="subject_combo">Subject Combination *</label><input id="subject_combo" name="subject_combo" value="{{ old('subject_combo') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="percentage">Aggregate Percentage *</label><input id="percentage" name="percentage" type="number" step="0.01" min="0" max="100" value="{{ old('percentage') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
        </div>
      </section>

      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Program Preferences</h2>
        <div class="mt-5 grid md:grid-cols-3 gap-4">
          <div><label class="block text-sm font-medium" for="pref1">First Choice *</label><select id="pref1" name="pref1" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select Program</option><option @selected(old('pref1') === 'B.Sc. Physics')>B.Sc. Physics</option><option @selected(old('pref1') === 'B.Sc. Chemistry')>B.Sc. Chemistry</option><option @selected(old('pref1') === 'B.A. English')>B.A. English</option><option @selected(old('pref1') === 'B.Com')>B.Com</option><option @selected(old('pref1') === 'BCA')>BCA</option><option @selected(old('pref1') === 'M.Sc. Physics')>M.Sc. Physics</option><option @selected(old('pref1') === 'M.Com')>M.Com</option></select></div>
          <div><label class="block text-sm font-medium" for="pref2">Second Choice *</label><select id="pref2" name="pref2" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select Program</option><option @selected(old('pref2') === 'B.Sc. Botany')>B.Sc. Botany</option><option @selected(old('pref2') === 'B.Sc. Zoology')>B.Sc. Zoology</option><option @selected(old('pref2') === 'B.A. Economics')>B.A. Economics</option><option @selected(old('pref2') === 'B.Voc Food Technology')>B.Voc Food Technology</option><option @selected(old('pref2') === 'M.Sc. Chemistry')>M.Sc. Chemistry</option><option @selected(old('pref2') === 'M.A. English')>M.A. English</option></select></div>
          <div><label class="block text-sm font-medium" for="pref3">Third Choice *</label><select id="pref3" name="pref3" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select Program</option><option @selected(old('pref3') === 'B.A. History')>B.A. History</option><option @selected(old('pref3') === 'B.A. Malayalam')>B.A. Malayalam</option><option @selected(old('pref3') === 'B.A. Sociology')>B.A. Sociology</option><option @selected(old('pref3') === 'Integrated M.A. English')>Integrated M.A. English</option><option @selected(old('pref3') === 'M.Sc. Food Science & Technology')>M.Sc. Food Science & Technology</option></select></div>
        </div>
      </section>

      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Documents Upload</h2>
        <div class="mt-5 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="doc_marksheet">10+2 Marksheet (PDF) *</label><input id="doc_marksheet" name="doc_marksheet" type="file" accept="application/pdf" class="mt-1 w-full text-sm" required /></div>
          <div><label class="block text-sm font-medium" for="doc_tc">Transfer Certificate (PDF) *</label><input id="doc_tc" name="doc_tc" type="file" accept="application/pdf" class="mt-1 w-full text-sm" required /></div>
          <div class="md:col-span-2"><label class="block text-sm font-medium" for="doc_community">Community Certificate (if applicable)</label><input id="doc_community" name="doc_community" type="file" accept="application/pdf" class="mt-1 w-full text-sm" /></div>
        </div>
      </section>

      <section class="space-y-4">
        <label class="flex items-start gap-3 text-sm"><input type="checkbox" name="declaration_confirmed" value="1" @checked(old('declaration_confirmed')) required class="mt-1" /><span>I confirm that the information provided is correct and I agree to admission verification policies.</span></label>
      </section>

      <div class="flex flex-wrap gap-3">
        <button type="submit" class="rounded-lg bg-sgcNavy text-white px-5 py-3 font-medium hover:bg-slate-800 focus-ring">Submit Application</button>
        <a href="{{ route('admissions.status') }}" class="rounded-lg border border-slate-300 px-5 py-3 font-medium hover:bg-slate-50 focus-ring">Track Existing Application</a>
      </div>
    </form>
@endsection
