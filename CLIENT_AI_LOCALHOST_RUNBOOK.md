# Client AI Runbook (Localhost)

This file is written for AI coding assistants (ChatGPT/Codex/Claude/Gemini/etc.) so they can run this project locally and demonstrate all currently available features.

## 1) What This Package Contains

The package has two parts:

1. **Working static prototype** (fully runnable now)
- Multi-page college website with public pages and portal demo pages.
- Interactive features already working in browser (filters, counters, admissions demo flow, testimonials).

2. **Laravel blueprint** (backend-ready scaffolding)
- Routes, controllers, migrations, Blade starter views, admin image manager scaffolding.
- Requires PHP/Composer/Laravel setup to run.

If the goal is to show all current visible features quickly, run the **static prototype**.

---

## 2) Quick Start (Static Prototype - Recommended)

### Prerequisite
- Node.js installed.

### Windows PowerShell commands

```powershell
cd "C:\Users\nisha\Documents\GOURI PROJECT"
node .\local-server.js
```

If `local-server.js` is missing, create it using the project version in this repository, then run:

```powershell
node .\local-server.js
```

### Open in browser
- [http://localhost:5500](http://localhost:5500)

---

## 3) Current Features to Demonstrate

## Public Website
- Homepage hero, key statistics counters, notice ticker.
- Recruiter section.
- Student testimonials section.
- Admissions pages.
- Departments, Academics, Placements, Facilities, Gallery, Contact, etc.

## Interactive Features
- **Admissions Apply Form**: generates demo application ID on submit.
- **Admissions Status Tracker**: test with demo IDs:
  - `SGC2026001`
  - `SGC2026002`
  - `SGC2026003`
  - `SGC2026004`
- **Notices filters** (category-based).
- **Gallery filters** (year/category based).
- Mobile menu + responsive layouts.

## Portal Demo Pages (UI)
- Student dashboard: `/pages/student/dashboard.html`
- Faculty dashboard: `/pages/faculty-portal/dashboard.html`
- Admin dashboard: `/pages/admin/dashboard.html`

---

## 4) AI Smoke-Test Checklist (Pass/Fail)

After opening `http://localhost:5500`, verify:

1. Home page loads without 404.
2. Stats animate when visible.
3. Notice ticker scrolls.
4. Testimonials section is visible.
5. Admissions apply form shows success message with generated ID.
6. Status tracker returns expected statuses for demo IDs.
7. Notices filter buttons hide/show cards correctly.
8. Gallery filters hide/show media cards correctly.
9. Student, Faculty, Admin dashboard pages open.
10. Mobile viewport (DevTools) shows functional menu and readable layout.

---

## 5) Optional: Laravel Mode (When Client Wants Backend Execution)

Use this only if environment has PHP + Composer + MySQL.

### Required tools
- PHP 8.2+
- Composer
- MySQL

### High-level steps
1. Create/prepare Laravel 11 app.
2. Copy blueprint files from `laravel-blueprint/` into Laravel project.
3. Configure `.env` for DB.
4. Run:

```bash
php artisan migrate
php artisan storage:link
php artisan db:seed
php artisan serve
```

5. Open `http://127.0.0.1:8000`.

### Admin credentials (Laravel seeded mode)
- Email: `gouriparvathy32@gmail.com`
- Password: `Admin@1234`

Then open:
- `/admin/home-sliders` to add/remove homepage images.

---

## 6) Notes for Client AI

- If backend tools are not installed, **do not block demo**; run static mode and present all currently visible features.
- Static mode does not require database.
- Laravel mode is backend upgrade path and supports admin-managed homepage images through Blade/controller/migration scaffolding included in this package.
