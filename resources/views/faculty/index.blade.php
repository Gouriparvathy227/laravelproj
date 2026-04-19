@extends('layouts.frontend')
@section('title', 'Faculty')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Faculty Directory</h1>
      <p class="mt-4 text-slate-700">Experienced faculty members with research and teaching expertise across disciplines.</p>
    </header>

    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach ($facultyMembers as $member)
        @php
          $name = data_get($member, 'name');
          $designation = data_get($member, 'designation');
          $department = data_get($member, 'department');
          $qualification = data_get($member, 'qualification') ?: 'Qualification pending';
          $specialization = data_get($member, 'specialization');
          $experienceYears = data_get($member, 'experience_years');
          $email = data_get($member, 'email');
        @endphp
        <article class="feature-card rounded-2xl bg-white border border-slate-200 p-5">
          <h2 class="font-semibold text-sgcNavy">{{ $name }}</h2>
          <p class="text-sm mt-2">{{ $designation }}, {{ $department }}</p>
          <p class="text-xs text-slate-600 mt-1">
            {{ $qualification }}
            @if (!empty($specialization))
              | {{ $specialization }}
            @endif
            | {{ $experienceYears }} years
          </p>
          @if (!empty($email))
            <p class="mt-2 text-xs">
              <a class="underline hover:text-sgcNavy" href="mailto:{{ $email }}">{{ $email }}</a>
            </p>
          @endif
        </article>
      @endforeach
    </section>
@endsection
