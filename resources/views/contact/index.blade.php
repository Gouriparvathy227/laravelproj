@extends('layouts.frontend')
@section('title', 'Contact')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Contact Us</h1>
      <p class="mt-4 text-slate-700">St. George's College Aruvithura, Erattupetta, Kottayam District, Kerala.</p>
    </header>

    <section class="mt-8 grid lg:grid-cols-3 gap-6">
      <article class="lg:col-span-2 rounded-2xl bg-white border border-slate-200 p-7">
        <h2 class="section-title font-heading text-2xl text-sgcNavy">Send an Inquiry</h2>
        <form class="mt-8 grid md:grid-cols-2 gap-4">
          <div><label class="block text-sm font-medium" for="name">Name *</label><input id="name" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="email">Email *</label><input type="email" id="email" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required /></div>
          <div><label class="block text-sm font-medium" for="phone">Phone</label><input type="tel" id="phone" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" /></div>
          <div><label class="block text-sm font-medium" for="topic">Topic</label><select id="topic" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring"><option>General</option><option>Admissions</option><option>Academics</option><option>Examinations</option></select></div>
          <div class="md:col-span-2"><label class="block text-sm font-medium" for="message">Message *</label><textarea id="message" rows="5" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus-ring" required></textarea></div>
          <div class="md:col-span-2 text-sm"><label class="inline-flex items-center gap-2"><input type="checkbox" required /><span>I am not a robot (reCAPTCHA v3 integration placeholder)</span></label></div>
          <div class="md:col-span-2"><button class="rounded-lg bg-sgcNavy text-white px-5 py-3 font-medium hover:bg-slate-800 focus-ring">Submit Inquiry</button></div>
        </form>
      </article>

      <aside class="rounded-2xl bg-sgcNavy text-white p-7">
        <h2 class="font-heading text-2xl">Contact Details</h2>
        <ul class="mt-5 space-y-2 text-sm">
          <li><strong>Address:</strong> Aruvithura, Erattupetta, Kottayam, Kerala 686122</li>
          <li><strong>Phone:</strong> +91 4822 273 235</li>
          <li><strong>Email:</strong> info@sgcaruvithura.ac.in</li>
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
          <tr class="border-b border-slate-100"><td data-label="Department" class="py-3 pr-4">Physics</td><td data-label="Email" class="py-3 pr-4">physics@sgcaruvithura.ac.in</td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 240</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Department" class="py-3 pr-4">Chemistry</td><td data-label="Email" class="py-3 pr-4">chemistry@sgcaruvithura.ac.in</td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 241</td></tr>
          <tr class="border-b border-slate-100"><td data-label="Department" class="py-3 pr-4">Commerce</td><td data-label="Email" class="py-3 pr-4">commerce@sgcaruvithura.ac.in</td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 242</td></tr>
          <tr><td data-label="Department" class="py-3 pr-4">Computer Science</td><td data-label="Email" class="py-3 pr-4">cs@sgcaruvithura.ac.in</td><td data-label="Phone" class="py-3 pr-4">+91 4822 273 243</td></tr>
        </tbody>
      </table>
    </section>
@endsection
