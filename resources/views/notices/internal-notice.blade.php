@extends('layouts.frontend')
@section('title', $title)
@section('content')
<section class="mx-auto max-w-4xl px-4 py-12">
  <article class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
    <p class="text-xs uppercase tracking-wide text-slate-500">Internal Notice</p>
    <h1 class="mt-2 font-heading text-3xl text-sgcNavy">{{ $title }}</h1>
    <p class="mt-6 text-sm leading-relaxed text-slate-700">
      This notice page is hosted internally on the college website. Detailed content and downloadable attachments for
      <strong>{{ $title }}</strong> will be published here by the administration team.
    </p>
    <a href="{{ route('notices.index') }}" class="mt-8 inline-flex rounded-lg bg-sgcNavy px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus-ring">
      Back to Notices
    </a>
  </article>
</section>
@endsection
