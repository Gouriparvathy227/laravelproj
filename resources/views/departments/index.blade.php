@extends('layouts.frontend')
@section('title', 'Departments')
@section('content')
<header class="rounded-3xl bg-white border border-slate-200 p-8">
      <h1 class="font-heading text-4xl text-sgcNavy">Departments</h1>
      <p class="mt-4 text-slate-700">15 academic departments drive multidisciplinary learning, research, and student engagement across science, arts, commerce, and technology.</p>
    </header>

    <section class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <article id="physics" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Physics</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Sc., M.Sc.</p><p class="mt-2 text-sm text-slate-600">Recognized research center with DST-FIST supported facilities.</p></article>
      <article id="chemistry" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Chemistry</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Sc., M.Sc.</p><p class="mt-2 text-sm text-slate-600">Research center focusing analytical and applied chemistry.</p></article>
      <article id="botany" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Botany</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Sc.</p><p class="mt-2 text-sm text-slate-600">Plant sciences, biodiversity, and environmental studies.</p></article>
      <article id="zoology" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Zoology</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Sc.</p><p class="mt-2 text-sm text-slate-600">Animal sciences with lab and field components.</p></article>
      <article id="mathematics" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Mathematics</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Sc.</p><p class="mt-2 text-sm text-slate-600">Pure and applied mathematics with analytical training.</p></article>
      <article id="computer-science" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Computer Science</h2><p class="mt-2 text-sm text-slate-700">Programs: BCA</p><p class="mt-2 text-sm text-slate-600">5 computer labs supporting programming and software practice.</p></article>
      <article id="food-technology" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Food Technology</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Voc, M.Sc.</p><p class="mt-2 text-sm text-slate-600">RUSA-funded science block and quality testing facilities.</p></article>
      <article id="english" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">English</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A., M.A., Integrated M.A.</p><p class="mt-2 text-sm text-slate-600">Literature, communication, and critical studies.</p></article>
      <article id="economics" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Economics</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A.</p><p class="mt-2 text-sm text-slate-600">Development economics, policy, and data interpretation.</p></article>
      <article id="commerce" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Commerce</h2><p class="mt-2 text-sm text-slate-700">Programs: B.Com, M.Com</p><p class="mt-2 text-sm text-slate-600">Accounting, taxation, finance, and banking readiness.</p></article>
      <article id="malayalam" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Malayalam</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A.</p><p class="mt-2 text-sm text-slate-600">Regional literature, culture, and language scholarship.</p></article>
      <article id="history" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">History</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A.</p><p class="mt-2 text-sm text-slate-600">Historical inquiry with local and global perspectives.</p></article>
      <article id="hindi" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Hindi</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A.</p><p class="mt-2 text-sm text-slate-600">Language, translation, and literary studies.</p></article>
      <article id="political-science" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Political Science</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A.</p><p class="mt-2 text-sm text-slate-600">Governance, political thought, and public policy.</p></article>
      <article id="sociology" class="feature-card rounded-2xl bg-white border border-slate-200 p-5"><h2 class="font-heading text-2xl text-sgcNavy">Sociology</h2><p class="mt-2 text-sm text-slate-700">Programs: B.A.</p><p class="mt-2 text-sm text-slate-600">Social structures, community studies, and applied sociology.</p></article>
    </section>

    <section class="mt-10 rounded-2xl bg-white border border-slate-200 p-7">
      <h2 class="section-title font-heading text-2xl text-sgcNavy">Department Contacts & Resources</h2>
      <p class="mt-8 text-sm text-slate-700">Each department page in the Laravel implementation will include: faculty directory, timetable, notice feed, syllabus downloads, lab/gallery section, and placement/research highlights.</p>
      <div class="mt-5 flex flex-wrap gap-3 text-sm">
        <a href="{{ route('contact.index') }}" class="rounded-lg bg-sgcNavy text-white px-4 py-2 hover:bg-slate-800 focus-ring">Department Directory</a>
        <a href="{{ route('academics.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-50 focus-ring">Program Details</a>
      </div>
    </section>
@endsection
