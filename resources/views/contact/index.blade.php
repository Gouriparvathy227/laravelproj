@extends('layouts.frontend')
@section('title', 'Contact')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Contact Us</h1>
      <p class="mt-4 text-slate-700">St. George's College Aruvithura, Erattupetta, Kottayam District, Kerala.</p>
    </header>

    @if (session('success'))
      <div class="mt-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mt-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
        <ul class="list-disc pl-5 space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <section class="mt-8 grid lg:grid-cols-3 gap-6">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Send an Inquiry</h2>
        <p class="mt-6 text-sm text-slate-600">All inquiries submitted here are stored securely in the website database and can be reviewed from the admin inquiry inbox.</p>
        <form method="POST" action="{{ route('contact.send') }}" class="mt-8 grid md:grid-cols-2 gap-4">
          @csrf
          <div><label class="block text-sm font-medium" for="name">Name *</label><input id="name" name="name" value="{{ old('name') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="email">Email *</label><input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="phone">Phone</label><input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" /></div>
          <div><label class="block text-sm font-medium" for="topic">Topic</label><select id="topic" name="topic" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring"><option value="General" @selected(old('topic') === 'General')>General</option><option value="Admissions" @selected(old('topic') === 'Admissions')>Admissions</option><option value="Academics" @selected(old('topic') === 'Academics')>Academics</option><option value="Examinations" @selected(old('topic') === 'Examinations')>Examinations</option></select></div>
          <div class="md:col-span-2"><label class="block text-sm font-medium" for="message">Message *</label><textarea id="message" name="message" rows="5" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required>{{ old('message') }}</textarea></div>
          <div class="md:col-span-2 text-sm"><label class="inline-flex items-center gap-2"><input type="checkbox" name="captcha_confirmed" value="1" @checked(old('captcha_confirmed')) required /><span>I am not a robot (reCAPTCHA v3 integration placeholder)</span></label></div>
          <div class="md:col-span-2"><button type="submit" class="rounded-lg bg-sgcNavy text-white px-5 py-3 font-medium hover:bg-slate-800 focus-ring">Submit Inquiry</button></div>
        </form>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-4 h-fit self-start w-fit max-w-xs">
        <h2 class="font-heading text-2xl">Contact Details</h2>
        <ul class="mt-4 space-y-3 text-sm">
          <li><strong>Address:</strong> Aruvithura, Erattupetta, Kottayam, Kerala 686122</li>
          <li><strong>Phone:</strong> +91 4822 273 235</li>
          <li><strong>Email:</strong> <a class="underline" href="mailto:info@sgcaruvithura.ac.in">info@sgcaruvithura.ac.in</a></li>
          <li><strong>Office Hours:</strong> 9:30 AM - 4:30 PM (Mon-Fri)</li>
        </ul>
      </aside>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-6">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Campus Location</h2>
      <div class="mt-6 aspect-[16/7] overflow-hidden rounded-xl border border-slate-200">
        <iframe title="St. George's College Aruvithura Location" class="h-full w-full" loading="lazy" src="https://maps.google.com/maps?q=Aruvithura%20Erattupetta%20Kerala&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
      </div>
    </section>

    <section class="mt-8 rounded-2xl bg-white border border-slate-200 p-7 table-wrap">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Department Directory (Sample)</h2>
      <table class="table-mobile-cards mt-8 min-w-full text-sm">
        <thead>
          <tr class="text-left border-b border-slate-200">
            <th class="py-3 pr-4">Department</th>
            <th class="py-3 pr-4">Email</th>
            <th class="py-3 pr-4">Phone</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-slate-100"><td data-label="Department" class="py-3 pr-4">Physics</td><td data-label="Email" class="py-3 pr-4"><a class="underline hover:text-sgcNavy" href="mailto:physics@sgcaruvithura.ac.in">physics@sgcaruvithura.ac.in</a></td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 240</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Department" class="py-3 pr-4">Chemistry</td><td data-label="Email" class="py-3 pr-4"><a class="underline hover:text-sgcNavy" href="mailto:chemistry@sgcaruvithura.ac.in">chemistry@sgcaruvithura.ac.in</a></td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 241</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Department" class="py-3 pr-4">Commerce</td><td data-label="Email" class="py-3 pr-4"><a class="underline hover:text-sgcNavy" href="mailto:commerce@sgcaruvithura.ac.in">commerce@sgcaruvithura.ac.in</a></td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 242</td></tr>
          <tr><td data-label="Department" class="py-3 pr-4">Computer Science</td><td data-label="Email" class="py-3 pr-4"><a class="underline hover:text-sgcNavy" href="mailto:cs@sgcaruvithura.ac.in">cs@sgcaruvithura.ac.in</a></td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 243</td></tr>
        </tbody>
      </table>
    </section>
@endsection
