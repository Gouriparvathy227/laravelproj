@extends('layouts.frontend')
@section('title', 'Admissions-apply')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Online Admission Application</h1>
      <p class="mt-3 text-sm text-slate-700">Complete all mandatory fields and upload documents in PDF format (max 5 MB each).</p>
    </header>

    <div id="admission-apply-result" class="hidden mt-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800"></div>

    <form id="admission-apply-form" class="mt-6 rounded-2xl bg-white border border-slate-200 p-7 space-y-8">
      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Personal Information</h2>
        <div class="mt-5 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="full_name">Full Name *</label><input class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" id="full_name" required /></div>
          <div><label class="block text-sm font-medium" for="dob">Date of Birth *</label><input type="date" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" id="dob" required /></div>
          <div><label class="block text-sm font-medium" for="gender">Gender *</label><select id="gender" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select</option><option>Male</option><option>Female</option><option>Other</option></select></div>
          <div><label class="block text-sm font-medium" for="category">Category *</label><select id="category" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select</option><option>General</option><option>SC</option><option>ST</option><option>OBC</option><option>Minority</option></select></div>
          <div><label class="block text-sm font-medium" for="religion">Religion</label><input id="religion" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" /></div>
          <div><label class="block text-sm font-medium" for="phone">Phone *</label><input id="phone" type="tel" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="email">Email *</label><input id="email" type="email" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div class="md:col-span-2"><label class="block text-sm font-medium" for="address">Address *</label><textarea id="address" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" rows="3" required></textarea></div>
        </div>
      </section>

      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Academic Information</h2>
        <div class="mt-5 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="school">10+2 School Name *</label><input id="school" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="board">Board *</label><input id="board" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="pass_year">Year of Passing *</label><input id="pass_year" type="number" min="2010" max="2026" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="subject_combo">Subject Combination *</label><input id="subject_combo" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="percentage">Aggregate Percentage *</label><input id="percentage" type="number" step="0.01" min="0" max="100" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
        </div>
      </section>

      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Program Preferences</h2>
        <div class="mt-5 grid md:grid-cols-3 gap-4">
          <div><label class="block text-sm font-medium" for="pref1">First Choice *</label><select id="pref1" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select Program</option><option>B.Sc. Physics</option><option>B.Sc. Chemistry</option><option>B.A. English</option><option>B.Com</option><option>BCA</option><option>M.Sc. Physics</option><option>M.Com</option></select></div>
          <div><label class="block text-sm font-medium" for="pref2">Second Choice *</label><select id="pref2" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select Program</option><option>B.Sc. Botany</option><option>B.Sc. Zoology</option><option>B.A. Economics</option><option>B.Voc Food Technology</option><option>M.Sc. Chemistry</option><option>M.A. English</option></select></div>
          <div><label class="block text-sm font-medium" for="pref3">Third Choice *</label><select id="pref3" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required><option value="">Select Program</option><option>B.A. History</option><option>B.A. Malayalam</option><option>B.A. Sociology</option><option>Integrated M.A. English</option><option>M.Sc. Food Science & Technology</option></select></div>
        </div>
      </section>

      <section>
        <h2 class="font-heading text-2xl text-sgcNavy">Documents Upload</h2>
        <div class="mt-5 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="doc_marksheet">10+2 Marksheet (PDF) *</label><input id="doc_marksheet" type="file" accept="application/pdf" class="mt-1 w-full text-sm" required /></div>
          <div><label class="block text-sm font-medium" for="doc_tc">Transfer Certificate (PDF) *</label><input id="doc_tc" type="file" accept="application/pdf" class="mt-1 w-full text-sm" required /></div>
          <div class="md:col-span-2"><label class="block text-sm font-medium" for="doc_community">Community Certificate (if applicable)</label><input id="doc_community" type="file" accept="application/pdf" class="mt-1 w-full text-sm" /></div>
        </div>
      </section>

      <section class="space-y-4">
        <label class="flex items-start gap-3 text-sm"><input type="checkbox" required class="mt-1" /><span>I confirm that the information provided is correct and I agree to admission verification policies.</span></label>
        <label class="flex items-start gap-3 text-sm"><input type="checkbox" required class="mt-1" /><span>I have completed CAPTCHA verification (reCAPTCHA v3 integration placeholder).</span></label>
      </section>

      <div class="flex flex-wrap gap-3">
        <button type="submit" class="rounded-lg bg-sgcNavy text-white px-5 py-3 font-medium hover:bg-slate-800 focus-ring">Submit Application</button>
        <a href="{{ route('admissions.status') }}" class="rounded-lg border border-slate-300 px-5 py-3 font-medium hover:bg-slate-50 focus-ring">Track Existing Application</a>
      </div>
    </form>
@endsection
